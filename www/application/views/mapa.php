<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Soundcheck</title>
        <!-- Estilos -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/mapa/mapa.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/mapa/jquery-ui.css" type="text/css">
        <link href="<?php echo base_url(); ?>assets/mapa/jquery.growl.css" rel="stylesheet" type="text/css" />

        <!-- Inicialização do JQuery -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.js"></script>
        
        <!-- Inicialização do JQuery UI (apenas autocomplete) -->
        <script src="<?php echo base_url(); ?>assets/mapa/jquery-ui.min.js"></script>
        
        <!-- Google Maps Javascript API v3 -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC6HIt-7BKNGCCQVBE09zZPZzLiujz5Klc&sensor=false&libraries=places"></script>
        
        <!-- MarkerClusterer para agrupar pontos do mapa -->
        <script src="<?php echo base_url(); ?>assets/mapa/markerclusterer.js"></script>
        
        <!-- Infobox exibido ao clicar nos pontos do mapa -->
        <script src="<?php echo base_url(); ?>assets/mapa/infobubble.js"></script>
        
        <!-- Arquivo de inicialização do mapa -->
        <script src="<?php echo base_url(); ?>assets/mapa/mapa.js"></script>
        <script src="<?php echo base_url(); ?>assets/mapa/jquery.ui.autocomplete.accentFolding.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/mapa/jquery.growl.js" type="text/javascript"></script>
        
    </head>
    
    <body>
        <div id="upper_head">
            <div class="busca">
                <form action="javascript:void(0);">
                    <label for="busca_input">Buscar: </label>
                    <select id="busca_dropdown">
                        <option value="servico">Serviço</option>
                        <option value="nome">Nome</option>
                        <option value="endereco">Endereço</option>
                    </select>
                    <input id="busca_input" type="search" name="busca_empresa" placeholder="Busque por nome, tipo de serviço ou endereço da empresa.">
                    <input id="busca_end_input" type="search" placeholder="Busque pelo endereço da empresa.">
                    <input id="busca_button" class="blue_button" type="submit" value="Buscar">
                </form>
            </div>
        </div>      

        <div id="lower_head">
            <button id="para_local" class="green_button">Ir para minha localização</button>
            <button id="mostrar_todos" class="green_button">Mostrar todas as empresas</button>
        </div>
    
        <div id="mapa"></div>

        <div id="status_bar">
            <p id="left_msg"></p>
            <p id="right_msg"></p>
        </div>
    </body>
</html>
