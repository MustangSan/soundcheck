//Controlador do mapa, para não criar variáveis em escopo global
function MapHandler() { 
  var me = this; //É necessário fazer isso aqui e em outros lugares por questões de escopo
  
  // Chama as funcoes assim que a página carregar
  google.maps.event.addDomListener(window, 'load', function () {
    me.initialize();
    me.loadMarkers();
  });
  
}

MapHandler.prototype.initialize = function() {
  var me = this;
  
  this.iniCenter = [-18, -47]; //Centro padrao caso nao suporte geolocation
  this.iniZoom = 6; //Zoom inicial (se não suportar geolocation)
  this.searchZoom = 10; //Zoom depois da busca
  this.OpenBox_id = ""; //Para manter apenas um infobox aberto por vez
  this.infoBox = []; //Vetor de InfoBox
  this.markers = []; //Vetor usado para agrupar os marcadores
  this.markerCluster = "" //Cluster que agrupa marcadores 
  this.empresas_nomes = []; //Vetor que armazena nomes das empresas (para autocomplete na busca por nomes)
  this.sysImgPath = "assets/images/"; //Caminho para as imagens do sistema
  this.uploadPath = "uploads/"; //Caminho para as imagens do usuário(uploads)
  this.imgPadrao = "no-image.png" //Imagem padrao de empresa
  this.logo = "logo.png" //Logo do Contato Ambiental
  this.icon = "icon_padrao.png"; //Icone dos marcadores
  this.searchLocationIcon = "zoom.png"; //Icone que aparece na busca
  this.currLocationIcon = "male-2.png"; //Icone que aparece na localizacao atual
  this.JsonPath = ""; //Caminho para o arquivo Json
  this.has_geolocation = false;
  this.geolocation = new google.maps.LatLng(0, 0); //armazena latlng do usuario
  this.buscaRealizada = false //controla a busca
  this.bounds = new google.maps.LatLngBounds(); //armazena as bounds para zoom fit
  
    var options = {
      zoom: this.iniZoom,
      minZoom: 3,
      center: new google.maps.LatLng(me.iniCenter[0], me.iniCenter[1]), //Centro padrao caso nao suporte geolocation
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    this.map = new google.maps.Map(document.getElementById("mapa"), options); // Cria o mapa com as opcoes
    this.geocoder = new google.maps.Geocoder(); //inicia o geocoder, que será usado na busca
    
    //marcador usado na busca por endereço
    this.searchMarker = new google.maps.Marker({
      position: me.geolocation,
      title: 'Esse é o local que você buscou!',
      map: me.map,
      zIndex: 0,
      visible: false,
      icon: me.sysImgPath + me.searchLocationIcon
        });
    
    //Se suportar HTML5 geolocation
    if (navigator.geolocation) {
    has_geolocation = true;
    $("#para_local").show();
    navigator.geolocation.getCurrentPosition(newCenter); //Retorna a funcao callback newCenter
  } else {
    $.growl.error({ title: "Erro!", message: "Geolocalização não é suportado pelo navegador." });
  }
  //Se suportar Geolocation, seta novo valor para o centro e cria marcador na posicao atual do visitante
  function newCenter(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    me.geolocation = new google.maps.LatLng(lat, lng);
    me.map.setCenter(me.geolocation); //Novo centro
    
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(lat, lng),
      title: 'Você está aqui!',
      map: me.map,
      zIndex: 0,
      icon: me.sysImgPath + me.currLocationIcon
        });
        
        //Cria autocomplete de endereço
        var autocomplete = new google.maps.places.Autocomplete(
    (document.getElementById('busca_end_input')),
    { types: ['geocode'] });
    // define regiao para basear busca
    autocomplete.setBounds( new google.maps.LatLngBounds(me.geolocation, me.geolocation) );
        
        me.map.setZoom(me.searchZoom-1);
  }
  
  google.maps.event.addListener(me.map, 'zoom_changed', function() {
    me.updateStatus();
  });
} //Initialize

//Para focar nas abas
function blink(elem, times, speed) {
    if (times > 0 || times < 0) {
        if ($(elem).hasClass("blink")) 
            $(elem).removeClass("blink");
        else
            $(elem).addClass("blink");
    }

    clearTimeout(function () {
        blink(elem, times, speed);
    });

    if (times > 0 || times < 0) {
        setTimeout(function () {
            blink(elem, times, speed);
        }, speed);
        times -= .5;
    }
}

//Abre infobox e fecha o que estiver aberto
MapHandler.prototype.openInfoBox = function(id, marker) { 
  var idOpen = this.OpenBox_id;
  var box = this.infoBox;
  
  //Incrementa contador de cliques
  $.ajax({
            type: "POST",
            url: "async/updateClicks",
            data: {id : id},
            success: function(response) { /* ok! */ }
        });

    if (typeof(idOpen) == 'number' && typeof(box[idOpen]) == 'object') {
        box[idOpen].close();
    }
 
    box[id].open(this.map, marker);
    this.OpenBox_id = id;
  blink('.infoTab', 3, 400)
}

//Carrega as configurações do sistema
MapHandler.prototype.loadConfig = function() {
  this.updateStatus();
}

MapHandler.prototype.updateStatus = function() {
  var status_left = document.getElementById('left_msg');
  status_left.innerHTML = '';
  
  var status_right = document.getElementById('right_msg');
  status_right.innerHTML = '';
  status_right.innerHTML += "Total de empresas: " + this.markers.length + " | ";
  status_right.innerHTML += "Zoom: " + this.map.getZoom();
}

//Desenha os pontos no mapa e cria seus respectivos infobox
MapHandler.prototype.loadMarkers = function() {
  var me = this;

    $.getJSON(me.JsonPath+'empresas.json', function(empresas) {
    var markers = me.markers;
    var box = me.infoBox;
        $.each(empresas, function(index, empresa) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(empresa.lat, empresa.lng),
                title: empresa.nomeFantasia,
                map: me.map,
                visible: true
            });
            markers.push(marker); //para agrupar marcadores próximos
            me.bounds.extend(marker.getPosition());
            me.empresas_nomes.push(empresa.nomeFantasia);
            
            var img_html = "";
      if (empresa.imagem) 
        img_html = "<img src=" + me.uploadPath + empresa.imagem + " style='max-width: 180px;'>";
      else 
        img_html = "<img src=" + me.sysImgPath + me.imgPadrao + " style='max-width: 180px;'>";
            //conteudo e demais opcoes da InfoBox
            var iniTab = "<div id=\"info_header\">"+
             "<h1>" + empresa.nomeFantasia + "</h1>"+
             "</div>"+
             "<div id=\"info_content\">"+ 
             "<div id=\"info_img\">" +
             img_html +
             "</div>"+
             "<div id=\"info_logo\">" +
             "<img src=" + me.sysImgPath + me.logo + " style='max-width: 180px;'>" +
             "</div>"+
             "<div id=\"info_text\">"+
             "<p>" + empresa.logradouro + "</p>"+
             "<p>" + empresa.bairro + "</p>"+
             "<p>" + empresa.complemento + "</p>"+
             "<p>" + empresa.cep + "</p>"+
             "<p>" + empresa.cidade + ", "+ empresa.estado + "</p>"+
             "<p>Tel: " + empresa.telefoneUm + "</p>"+
             "<p>Fax: " + empresa.fax + "</p>"+
             "<p>E-mail: <a href = mailto:" +empresa.email+ ">" + empresa.email + "</a></p>"+
             "<a href =" + empresa.website + " target=\"_blank\">" + empresa.website + "</a>"+
             "<p>GPS: " + empresa.lat + ", " + empresa.lng + "</p>"+
             "</div>"+
             "</div>";
      // Cria tab de atividades
      var atividades_list = "<ul>";
      empresa.atividades.forEach (function(atividade) {
        atividade_html = "<li>" + atividade + "</li>";
        atividades_list += atividade_html;
      });
      atividades_list += "</ul></div>";
      // Estrutura da tab
      var ativTab =   "<div id=\"tab2\">"+
              "<div id=\"info_header\">"+
              "<h1>Atividades:</h1>"+
              "</div>";
      ativTab += atividades_list;
      
      // Cria tab de categorias
      var categorias_list = "<ul>";
      empresa.categorias.forEach (function(categoria) {
        categoria_html = "<li>" + categoria + "</li>";
        categorias_list += categoria_html;
      });
      categorias_list += "</ul></div>";
      // Estrutura da tab
      var catTab =   "<div id=\"tab3\">"+
              "<div id=\"info_header\">"+
              "<h1>Categorias:</h1>"+
              "</div>";
      catTab += categorias_list;
       
            var boxOptions = {
        map: me.map,
        content: "",
        shadowStyle: 1,
        arrowStyle: 0,
        minWidth: 500,
        maxWidth: 500,
        minHeight: 300,
        padding: 15,
        borderColor: '#254715',
        backgroundColor: '#F0F7F0',
        borderWidth: 2,
        tabClassName: 'infoTab',
        backgroundClassName: 'infoBox'
      };
 
      box[empresa.idEmpresa] = new InfoBubble(boxOptions); 
      box[empresa.idEmpresa].addTab('Informações', iniTab);
      box[empresa.idEmpresa].addTab('Atividades', ativTab);
      box[empresa.idEmpresa].addTab('Categorias', catTab);
      box[empresa.idEmpresa].marker = marker;
     
      box[empresa.idEmpresa].listener = google.maps.event.addListener(marker, 'click', function (e) {
        me.openInfoBox(empresa.idEmpresa, marker);
      });

        }); //each
        me.markerCluster = new MarkerClusterer(me.map, markers); //Agrupar pontos próximos
        me.loadConfig(); //Carrega configurações do sistema
    }); //GET
} //loadMarkers

String.prototype.replaceSpecialChars = function() {
    var new_str;
    new_str = this.replace(/[ÀÁÂÄÃ]/g,"A");
    new_str = new_str.replace(/[ÈÉÊËẼ]/g,"E");
    new_str = new_str.replace(/[ÌÍÎÏĨ]/g,"I");
    new_str = new_str.replace(/[ÒÓÔÖÕ]/g,"O");
  new_str = new_str.replace(/[ÙÚÛÜŨ]/g,"U");
    new_str = new_str.replace(/[Ç]/g,"C");

    return new_str;
}

MapHandler.prototype.searchServico = function(input) {
  var me = this;
  var results = [];
  var found = false;
  var status_left = document.getElementById('left_msg');
  
  me.bounds = new google.maps.LatLngBounds();
  
  if (input.length > 2) {
    var input_split = input.split(' ');
    var uppercased_inputs = [];
    input_split.forEach(function(word) {
      if (word.length > 2) {
        var clean_upper_word = word.toUpperCase().replaceSpecialChars();
        uppercased_inputs.push(clean_upper_word);
      }
    })
    
    $.getJSON ("empresas.json", function(empresas) {
      $.each(empresas, function(i, empresa) {
        found = false;
        var filtros = empresa.categorias.concat(empresa.atividades);
        for (var j = filtros.length-1; j >= 0; j--) {
          var clean_upper_filter = filtros[j].toUpperCase().replaceSpecialChars();
            for (var k = uppercased_inputs.length-1; k >= 0; k--) {
            if (clean_upper_filter.indexOf(uppercased_inputs[k]) != -1) {
              results.push(me.markers[i]);
              me.bounds.extend(me.markers[i].getPosition());
              found = true;
              break;
            }
            if (found) break;
          }
        }
        me.markers[i].setVisible(found);
      });
      if ( results.length == 0) {
        for (var i = me.markers.length-1; i >= 0; i--) me.markers[i].setVisible(true); //mostra todos marcadores
        $.growl.error({ title: "Erro!", message: "Nenhuma empresa foi encontrada!" });
      } else {
        me.markerCluster.clearMarkers();
        me.markerCluster = new MarkerClusterer(me.map, results); //recriar o cluster de marcadores
        me.map.setCenter(me.geolocation);
        me.map.fitBounds(me.bounds);
        var texto = results.length;
        if (results.length == 1)
          texto += " empresa foi encontrada.";
        else
          texto += " empresas foram encontradas.";
        $.growl.notice({ title: "Sucesso!", message: texto });
        status_left.innerHTML = "Mostrando " + results.length + " de " + me.markers.length + " empresas.";
        //me.map.setZoom(me.searchZoom);
      }
      me.buscaRealizada = found;
      return results;
    });
  } else {
    $.growl.error({ title: "Erro!", message: "Seu texto deve conter pelo menos 3 caracteres." });
  }
}

MapHandler.prototype.searchNome = function(nome) {
  var me = this;
  var found = false;
  
  for (var i = me.empresas_nomes.length-1; i >= 0 ; i--) {
    me.markers[i].setVisible(false); //Esconde todos os marcadores
    if (me.empresas_nomes[i] == nome) { 
      me.markers[i].setVisible(true); //mostra marcador escolhido
      me.map.setCenter( me.markers[i].getPosition() );
      me.map.setZoom(me.searchZoom);
      
      //Recria o cluster
      me.markerCluster.clearMarkers();
      me.markerCluster = new MarkerClusterer(me.map, new Array(me.markers[i]));
      
      found = true;
      $.growl.notice({ title: "Sucesso!", message: "Empresa '" + nome + "' encontrada!" });
    }
  }
  
  if (!found) {
    $.growl.error({ title: "Erro!", message: "Empresa '" + nome + "'   não encontrada!" });
  }
  
  me.buscaRealizada = found;
}

MapHandler.prototype.searchEndereco = function(endereco) {
  var me = this;
  var map = me.map;
  var found = false;
  
  me.geocoder.geocode( { 'address': endereco }, function (results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    var location = results[0].geometry.location;
    var latitude = results[0].geometry.location.lat();
        var longitude = results[0].geometry.location.lng();
 
        var location = new google.maps.LatLng(latitude, longitude);
        
    me.searchMarker.setPosition(location);
    me.searchMarker.setVisible(true);
        
        map.setCenter(location);
        if (map.getZoom() < me.searchZoom)
      map.setZoom(me.searchZoom);
      
    found = true;
    $.growl.warning({ title: "", message: "Mostrando empresas próximas do endereço buscado!" });
  } else {
    $.growl.error({ title: "Erro!", message: "O endereço não foi encontrado." });
  }
  });
  
  me.buscaRealizada = found;
};

$(document).ready(function() {
  var handler = new MapHandler();
  
  var search_button = document.getElementById('busca_button');
  var input_field = document.getElementById('busca_input');
  var dropdown = document.getElementById('busca_dropdown');
  var to_loc_bt = document.getElementById('para_local');
  var show_all_bt = document.getElementById('mostrar_todos');
  
  setTimeout(
    function() {
    $("#busca_input").attr("placeholder", "Descreva o tipo de serviço que deseja encontrar.");
    },
    2000
  );
  
  search_button.addEventListener(
    'click', 
    function() {
      // Reseta marcadores
      if (handler.buscaRealizada) {
        handler.updateStatus(); //Recarrega a barra de status
        handler.bounds = new google.maps.LatLngBounds();
        handler.markers.forEach(function(marker) {
          marker.setVisible(true);
          handler.bounds.extend(marker.getPosition());
        });
        handler.markerCluster.clearMarkers();
        handler.markerCluster = new MarkerClusterer(handler.map, handler.markers);
      }
      
      var input = input_field.value;
      var end_input = document.getElementById('busca_end_input').value;
      var search_type = dropdown.value;
      if (input != "" || end_input != "") {
        if (handler.markers.length > 0) {
          if (search_type == 'servico') {
            handler.searchServico(input);
          }
          else if (search_type == 'nome') {
            handler.searchNome(input);
          }
          else if (search_type == 'endereco') {
            handler.searchEndereco( $("#busca_end_input").val() );
          }
        } else {
          $.growl.error({ title: "Erro!", message: "O sistema não possui empresas cadastradas." });
        }
      } else {
        $.growl.error({ title: "Erro!", message: "Insira algum texto no campo de busca." });
      }
    },
    false
  );
  
  dropdown.addEventListener(
    'change',
    function() {
      $('#busca_input').val(""); //Reseta o campo de busca
      $('#busca_end_input').val(""); //Reseta o campo de busca
      if (dropdown.value == "endereco") {
        $("#busca_input").hide();
        $("#busca_end_input").show();
      } else { // != "endereco"
        handler.searchMarker.setVisible(false); // Esconde marcador de busca
        $("#busca_end_input").hide();
        $("#busca_input").show();
        
        if (dropdown.value == "nome") { // se for nome cria autocomplete
            $("#busca_input").attr("placeholder", "Busque pelo nome da empresa. (escolha uma das sugestões)");
            $( "#busca_input" ).autocomplete(
            {
              source: handler.empresas_nomes,
              autoFocus: true,
            });
        } else { // == "servico"
          $("#busca_input").autocomplete({source: []}); //remove autocomplete de nome
          $("#busca_input").attr("placeholder", "Descreva o tipo de serviço que deseja encontrar.");
        }
      }
    },
    false
  );
  
  to_loc_bt.addEventListener(
  'click',
  function() {
    handler.map.setCenter(handler.geolocation);
    handler.map.setZoom(handler.searchZoom);
  },
  false
  );
  
  show_all_bt.addEventListener(
  'click',
  function() {
    if (handler.markers.length > 0) {
      handler.bounds = new google.maps.LatLngBounds();
      for (var i in handler.markers) {
        handler.markers[i].setVisible(true);
        handler.bounds.extend(handler.markers[i].getPosition());
      }
      handler.markerCluster.clearMarkers(); //Resetar marcadores
      handler.markerCluster = new MarkerClusterer(handler.map, handler.markers);
      handler.map.fitBounds(handler.bounds);
    } else {
      $.growl.error({ title: "Erro!", message: "O sistema não possui empresas cadastradas."});
    }
  },
  false
  );
  
});