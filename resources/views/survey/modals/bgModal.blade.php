<div class="modal fade" tabindex="-1" role="dialog" id="bgModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Background</h4>
            </div>
        <div class="modal-body">
    

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
            	<a href="#bg-image-selector" aria-controls="home" role="tab" data-toggle="tab">Image</a>
            </li>
            <li role="presentation">
            	<a href="#bg-color-selector" aria-controls="profile" role="tab" data-toggle="tab">Color</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="bg-image-selector">
    	@for ($i=0; $i < count($images); $i++)
        	@if ($i == 0 || $i % 5 == 0)
			<div class="row">
			@endif
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail" onclick="imgSelect(this)">
    				    <img imgid="{{ $images[$i]->id }}" src="/images/{{ $images[$i]->filename }}">
    				</a>
    			</div>
    		@if ($i != 0 && $i % 4 == 0 || $i == count($images) - 1)
			</div>
			@endif
    	@endfor	
    
			<div id="image-upload">
    			{!! Form::open() !!}
    			{!! Form::label('image', 'Add New Image') !!}
    			{!! Form::file('image') !!}
    			{!! Form::close() !!}
    			
    		</div>	        	
		</div>

		<div role="tabpanel" class="tab-pane" id="bg-color-selector">
			<p>
    			<img style="margin-right:2px;" src="/images/img_colormap.gif" usemap="#colormap" alt="colormap">
    			<map id="colormap" name="colormap" onmouseout="mouseOutMap()">
                    <area style="cursor:pointer" shape="poly" coords="63,0,72,4,72,15,63,19,54,15,54,4" onclick="selectColor('#003366')" onmouseover="mouseOverColor('#003366')" alt="#003366">
                    <area style="cursor:pointer" shape="poly" coords="81,0,90,4,90,15,81,19,72,15,72,4" onclick="selectColor('#336699')" onmouseover="mouseOverColor('#336699')" alt="#336699">
                    <area style="cursor:pointer" shape="poly" coords="99,0,108,4,108,15,99,19,90,15,90,4" onclick="selectColor('#3366CC')" onmouseover="mouseOverColor('#3366CC')" alt="#3366CC">
                    <area style="cursor:pointer" shape="poly" coords="117,0,126,4,126,15,117,19,108,15,108,4" onclick="selectColor('#003399')" onmouseover="mouseOverColor('#003399')" alt="#003399">
                    <area style="cursor:pointer" shape="poly" coords="135,0,144,4,144,15,135,19,126,15,126,4" onclick="selectColor('#000099')" onmouseover="mouseOverColor('#000099')" alt="#000099">
                    <area style="cursor:pointer" shape="poly" coords="153,0,162,4,162,15,153,19,144,15,144,4" onclick="selectColor('#0000CC')" onmouseover="mouseOverColor('#0000CC')" alt="#0000CC">
                    <area style="cursor:pointer" shape="poly" coords="171,0,180,4,180,15,171,19,162,15,162,4" onclick="selectColor('#000066')" onmouseover="mouseOverColor('#000066')" alt="#000066">
                    <area style="cursor:pointer" shape="poly" coords="54,15,63,19,63,30,54,34,45,30,45,19" onclick="selectColor('#006666')" onmouseover="mouseOverColor('#006666')" alt="#006666">
                    <area style="cursor:pointer" shape="poly" coords="72,15,81,19,81,30,72,34,63,30,63,19" onclick="selectColor('#006699')" onmouseover="mouseOverColor('#006699')" alt="#006699">
                    <area style="cursor:pointer" shape="poly" coords="90,15,99,19,99,30,90,34,81,30,81,19" onclick="selectColor('#0099CC')" onmouseover="mouseOverColor('#0099CC')" alt="#0099CC">
                    <area style="cursor:pointer" shape="poly" coords="108,15,117,19,117,30,108,34,99,30,99,19" onclick="selectColor('#0066CC')" onmouseover="mouseOverColor('#0066CC')" alt="#0066CC">
                    <area style="cursor:pointer" shape="poly" coords="126,15,135,19,135,30,126,34,117,30,117,19" onclick="selectColor('#0033CC')" onmouseover="mouseOverColor('#0033CC')" alt="#0033CC">
                    <area style="cursor:pointer" shape="poly" coords="144,15,153,19,153,30,144,34,135,30,135,19" onclick="selectColor('#0000FF')" onmouseover="mouseOverColor('#0000FF')" alt="#0000FF">
                    <area style="cursor:pointer" shape="poly" coords="162,15,171,19,171,30,162,34,153,30,153,19" onclick="selectColor('#3333FF')" onmouseover="mouseOverColor('#3333FF')" alt="#3333FF">
                    <area style="cursor:pointer" shape="poly" coords="180,15,189,19,189,30,180,34,171,30,171,19" onclick="selectColor('#333399')" onmouseover="mouseOverColor('#333399')" alt="#333399">
                    <area style="cursor:pointer" shape="poly" coords="45,30,54,34,54,45,45,49,36,45,36,34" onclick="selectColor('#669999')" onmouseover="mouseOverColor('#669999')" alt="#669999">
                    <area style="cursor:pointer" shape="poly" coords="63,30,72,34,72,45,63,49,54,45,54,34" onclick="selectColor('#009999')" onmouseover="mouseOverColor('#009999')" alt="#009999">
                    <area style="cursor:pointer" shape="poly" coords="81,30,90,34,90,45,81,49,72,45,72,34" onclick="selectColor('#33CCCC')" onmouseover="mouseOverColor('#33CCCC')" alt="#33CCCC">
                    <area style="cursor:pointer" shape="poly" coords="99,30,108,34,108,45,99,49,90,45,90,34" onclick="selectColor('#00CCFF')" onmouseover="mouseOverColor('#00CCFF')" alt="#00CCFF">
                    <area style="cursor:pointer" shape="poly" coords="117,30,126,34,126,45,117,49,108,45,108,34" onclick="selectColor('#0099FF')" onmouseover="mouseOverColor('#0099FF')" alt="#0099FF">
                    <area style="cursor:pointer" shape="poly" coords="135,30,144,34,144,45,135,49,126,45,126,34" onclick="selectColor('#0066FF')" onmouseover="mouseOverColor('#0066FF')" alt="#0066FF">
                    <area style="cursor:pointer" shape="poly" coords="153,30,162,34,162,45,153,49,144,45,144,34" onclick="selectColor('#3366FF')" onmouseover="mouseOverColor('#3366FF')" alt="#3366FF">
                    <area style="cursor:pointer" shape="poly" coords="171,30,180,34,180,45,171,49,162,45,162,34" onclick="selectColor('#3333CC')" onmouseover="mouseOverColor('#3333CC')" alt="#3333CC">
                    <area style="cursor:pointer" shape="poly" coords="189,30,198,34,198,45,189,49,180,45,180,34" onclick="selectColor('#666699')" onmouseover="mouseOverColor('#666699')" alt="#666699">
                    <area style="cursor:pointer" shape="poly" coords="36,45,45,49,45,60,36,64,27,60,27,49" onclick="selectColor('#339966')" onmouseover="mouseOverColor('#339966')" alt="#339966">
                    <area style="cursor:pointer" shape="poly" coords="54,45,63,49,63,60,54,64,45,60,45,49" onclick="selectColor('#00CC99')" onmouseover="mouseOverColor('#00CC99')" alt="#00CC99">
                    <area style="cursor:pointer" shape="poly" coords="72,45,81,49,81,60,72,64,63,60,63,49" onclick="selectColor('#00FFCC')" onmouseover="mouseOverColor('#00FFCC')" alt="#00FFCC">
                    <area style="cursor:pointer" shape="poly" coords="90,45,99,49,99,60,90,64,81,60,81,49" onclick="selectColor('#00FFFF')" onmouseover="mouseOverColor('#00FFFF')" alt="#00FFFF">
                    <area style="cursor:pointer" shape="poly" coords="108,45,117,49,117,60,108,64,99,60,99,49" onclick="selectColor('#33CCFF')" onmouseover="mouseOverColor('#33CCFF')" alt="#33CCFF">
                    <area style="cursor:pointer" shape="poly" coords="126,45,135,49,135,60,126,64,117,60,117,49" onclick="selectColor('#3399FF')" onmouseover="mouseOverColor('#3399FF')" alt="#3399FF">
                    <area style="cursor:pointer" shape="poly" coords="144,45,153,49,153,60,144,64,135,60,135,49" onclick="selectColor('#6699FF')" onmouseover="mouseOverColor('#6699FF')" alt="#6699FF">
                    <area style="cursor:pointer" shape="poly" coords="162,45,171,49,171,60,162,64,153,60,153,49" onclick="selectColor('#6666FF')" onmouseover="mouseOverColor('#6666FF')" alt="#6666FF">
                    <area style="cursor:pointer" shape="poly" coords="180,45,189,49,189,60,180,64,171,60,171,49" onclick="selectColor('#6600FF')" onmouseover="mouseOverColor('#6600FF')" alt="#6600FF">
                    <area style="cursor:pointer" shape="poly" coords="198,45,207,49,207,60,198,64,189,60,189,49" onclick="selectColor('#6600CC')" onmouseover="mouseOverColor('#6600CC')" alt="#6600CC">
                    <area style="cursor:pointer" shape="poly" coords="27,60,36,64,36,75,27,79,18,75,18,64" onclick="selectColor('#339933')" onmouseover="mouseOverColor('#339933')" alt="#339933">
                    <area style="cursor:pointer" shape="poly" coords="45,60,54,64,54,75,45,79,36,75,36,64" onclick="selectColor('#00CC66')" onmouseover="mouseOverColor('#00CC66')" alt="#00CC66">
                    <area style="cursor:pointer" shape="poly" coords="63,60,72,64,72,75,63,79,54,75,54,64" onclick="selectColor('#00FF99')" onmouseover="mouseOverColor('#00FF99')" alt="#00FF99">
                    <area style="cursor:pointer" shape="poly" coords="81,60,90,64,90,75,81,79,72,75,72,64" onclick="selectColor('#66FFCC')" onmouseover="mouseOverColor('#66FFCC')" alt="#66FFCC">
                    <area style="cursor:pointer" shape="poly" coords="99,60,108,64,108,75,99,79,90,75,90,64" onclick="selectColor('#66FFFF')" onmouseover="mouseOverColor('#66FFFF')" alt="#66FFFF">
                    <area style="cursor:pointer" shape="poly" coords="117,60,126,64,126,75,117,79,108,75,108,64" onclick="selectColor('#66CCFF')" onmouseover="mouseOverColor('#66CCFF')" alt="#66CCFF">
                    <area style="cursor:pointer" shape="poly" coords="135,60,144,64,144,75,135,79,126,75,126,64" onclick="selectColor('#99CCFF')" onmouseover="mouseOverColor('#99CCFF')" alt="#99CCFF">
                    <area style="cursor:pointer" shape="poly" coords="153,60,162,64,162,75,153,79,144,75,144,64" onclick="selectColor('#9999FF')" onmouseover="mouseOverColor('#9999FF')" alt="#9999FF">
                    <area style="cursor:pointer" shape="poly" coords="171,60,180,64,180,75,171,79,162,75,162,64" onclick="selectColor('#9966FF')" onmouseover="mouseOverColor('#9966FF')" alt="#9966FF">
                    <area style="cursor:pointer" shape="poly" coords="189,60,198,64,198,75,189,79,180,75,180,64" onclick="selectColor('#9933FF')" onmouseover="mouseOverColor('#9933FF')" alt="#9933FF">
                    <area style="cursor:pointer" shape="poly" coords="207,60,216,64,216,75,207,79,198,75,198,64" onclick="selectColor('#9900FF')" onmouseover="mouseOverColor('#9900FF')" alt="#9900FF">
                    <area style="cursor:pointer" shape="poly" coords="18,75,27,79,27,90,18,94,9,90,9,79" onclick="selectColor('#006600',-125,9)" onmouseover="mouseOverColor('#006600')" alt="#006600">
                    <area style="cursor:pointer" shape="poly" coords="36,75,45,79,45,90,36,94,27,90,27,79" onclick="selectColor('#00CC00')" onmouseover="mouseOverColor('#00CC00')" alt="#00CC00">
                    <area style="cursor:pointer" shape="poly" coords="54,75,63,79,63,90,54,94,45,90,45,79" onclick="selectColor('#00FF00')" onmouseover="mouseOverColor('#00FF00')" alt="#00FF00">
                    <area style="cursor:pointer" shape="poly" coords="72,75,81,79,81,90,72,94,63,90,63,79" onclick="selectColor('#66FF99')" onmouseover="mouseOverColor('#66FF99')" alt="#66FF99">
                    <area style="cursor:pointer" shape="poly" coords="90,75,99,79,99,90,90,94,81,90,81,79" onclick="selectColor('#99FFCC')" onmouseover="mouseOverColor('#99FFCC')" alt="#99FFCC">
                    <area style="cursor:pointer" shape="poly" coords="108,75,117,79,117,90,108,94,99,90,99,79" onclick="selectColor('#CCFFFF')" onmouseover="mouseOverColor('#CCFFFF')" alt="#CCFFFF">
                    <area style="cursor:pointer" shape="poly" coords="126,75,135,79,135,90,126,94,117,90,117,79" onclick="selectColor('#CCCCFF')" onmouseover="mouseOverColor('#CCCCFF')" alt="#CCCCFF">
                    <area style="cursor:pointer" shape="poly" coords="144,75,153,79,153,90,144,94,135,90,135,79" onclick="selectColor('#CC99FF')" onmouseover="mouseOverColor('#CC99FF')" alt="#CC99FF">
                    <area style="cursor:pointer" shape="poly" coords="162,75,171,79,171,90,162,94,153,90,153,79" onclick="selectColor('#CC66FF')" onmouseover="mouseOverColor('#CC66FF')" alt="#CC66FF">
                    <area style="cursor:pointer" shape="poly" coords="180,75,189,79,189,90,180,94,171,90,171,79" onclick="selectColor('#CC33FF')" onmouseover="mouseOverColor('#CC33FF')" alt="#CC33FF">
                    <area style="cursor:pointer" shape="poly" coords="198,75,207,79,207,90,198,94,189,90,189,79" onclick="selectColor('#CC00FF')" onmouseover="mouseOverColor('#CC00FF')" alt="#CC00FF">
                    <area style="cursor:pointer" shape="poly" coords="216,75,225,79,225,90,216,94,207,90,207,79" onclick="selectColor('#9900CC')" onmouseover="mouseOverColor('#9900CC')" alt="#9900CC">
                    <area style="cursor:pointer" shape="poly" coords="9,90,18,94,18,105,9,109,0,105,0,94" onclick="selectColor('#003300',-110,0)" onmouseover="mouseOverColor('#003300')" alt="#003300">
                    <area style="cursor:pointer" shape="poly" coords="27,90,36,94,36,105,27,109,18,105,18,94" onclick="selectColor('#009933')" onmouseover="mouseOverColor('#009933')" alt="#009933">
                    <area style="cursor:pointer" shape="poly" coords="45,90,54,94,54,105,45,109,36,105,36,94" onclick="selectColor('#33CC33')" onmouseover="mouseOverColor('#33CC33')" alt="#33CC33">
                    <area style="cursor:pointer" shape="poly" coords="63,90,72,94,72,105,63,109,54,105,54,94" onclick="selectColor('#66FF66')" onmouseover="mouseOverColor('#66FF66')" alt="#66FF66">
                    <area style="cursor:pointer" shape="poly" coords="81,90,90,94,90,105,81,109,72,105,72,94" onclick="selectColor('#99FF99')" onmouseover="mouseOverColor('#99FF99')" alt="#99FF99">
                    <area style="cursor:pointer" shape="poly" coords="99,90,108,94,108,105,99,109,90,105,90,94" onclick="selectColor('#CCFFCC')" onmouseover="mouseOverColor('#CCFFCC')" alt="#CCFFCC">
                    <area style="cursor:pointer" shape="poly" coords="117,90,126,94,126,105,117,109,108,105,108,94" onclick="selectColor('#FFFFFF')" onmouseover="mouseOverColor('#FFFFFF')" alt="#FFFFFF">
                    <area style="cursor:pointer" shape="poly" coords="135,90,144,94,144,105,135,109,126,105,126,94" onclick="selectColor('#FFCCFF')" onmouseover="mouseOverColor('#FFCCFF')" alt="#FFCCFF">
                    <area style="cursor:pointer" shape="poly" coords="153,90,162,94,162,105,153,109,144,105,144,94" onclick="selectColor('#FF99FF')" onmouseover="mouseOverColor('#FF99FF')" alt="#FF99FF">
                    <area style="cursor:pointer" shape="poly" coords="171,90,180,94,180,105,171,109,162,105,162,94" onclick="selectColor('#FF66FF')" onmouseover="mouseOverColor('#FF66FF')" alt="#FF66FF">
                    <area style="cursor:pointer" shape="poly" coords="189,90,198,94,198,105,189,109,180,105,180,94" onclick="selectColor('#FF00FF')" onmouseover="mouseOverColor('#FF00FF')" alt="#FF00FF">
                    <area style="cursor:pointer" shape="poly" coords="207,90,216,94,216,105,207,109,198,105,198,94" onclick="selectColor('#CC00CC')" onmouseover="mouseOverColor('#CC00CC')" alt="#CC00CC">
                    <area style="cursor:pointer" shape="poly" coords="225,90,234,94,234,105,225,109,216,105,216,94" onclick="selectColor('#660066')" onmouseover="mouseOverColor('#660066')" alt="#660066">
                    <area style="cursor:pointer" shape="poly" coords="18,105,27,109,27,120,18,124,9,120,9,109" onclick="selectColor('#336600',-95,9)" onmouseover="mouseOverColor('#336600')" alt="#336600">
                    <area style="cursor:pointer" shape="poly" coords="36,105,45,109,45,120,36,124,27,120,27,109" onclick="selectColor('#009900')" onmouseover="mouseOverColor('#009900')" alt="#009900">
                    <area style="cursor:pointer" shape="poly" coords="54,105,63,109,63,120,54,124,45,120,45,109" onclick="selectColor('#66FF33')" onmouseover="mouseOverColor('#66FF33')" alt="#66FF33">
                    <area style="cursor:pointer" shape="poly" coords="72,105,81,109,81,120,72,124,63,120,63,109" onclick="selectColor('#99FF66')" onmouseover="mouseOverColor('#99FF66')" alt="#99FF66">
                    <area style="cursor:pointer" shape="poly" coords="90,105,99,109,99,120,90,124,81,120,81,109" onclick="selectColor('#CCFF99')" onmouseover="mouseOverColor('#CCFF99')" alt="#CCFF99">
                    <area style="cursor:pointer" shape="poly" coords="108,105,117,109,117,120,108,124,99,120,99,109" onclick="selectColor('#FFFFCC')" onmouseover="mouseOverColor('#FFFFCC')" alt="#FFFFCC">
                    <area style="cursor:pointer" shape="poly" coords="126,105,135,109,135,120,126,124,117,120,117,109" onclick="selectColor('#FFCCCC')" onmouseover="mouseOverColor('#FFCCCC')" alt="#FFCCCC">
                    <area style="cursor:pointer" shape="poly" coords="144,105,153,109,153,120,144,124,135,120,135,109" onclick="selectColor('#FF99CC')" onmouseover="mouseOverColor('#FF99CC')" alt="#FF99CC">
                    <area style="cursor:pointer" shape="poly" coords="162,105,171,109,171,120,162,124,153,120,153,109" onclick="selectColor('#FF66CC')" onmouseover="mouseOverColor('#FF66CC')" alt="#FF66CC">
                    <area style="cursor:pointer" shape="poly" coords="180,105,189,109,189,120,180,124,171,120,171,109" onclick="selectColor('#FF33CC')" onmouseover="mouseOverColor('#FF33CC')" alt="#FF33CC">
                    <area style="cursor:pointer" shape="poly" coords="198,105,207,109,207,120,198,124,189,120,189,109" onclick="selectColor('#CC0099')" onmouseover="mouseOverColor('#CC0099')" alt="#CC0099">
                    <area style="cursor:pointer" shape="poly" coords="216,105,225,109,225,120,216,124,207,120,207,109" onclick="selectColor('#993399')" onmouseover="mouseOverColor('#993399')" alt="#993399">
                    <area style="cursor:pointer" shape="poly" coords="27,120,36,124,36,135,27,139,18,135,18,124" onclick="selectColor('#333300')" onmouseover="mouseOverColor('#333300')" alt="#333300">
                    <area style="cursor:pointer" shape="poly" coords="45,120,54,124,54,135,45,139,36,135,36,124" onclick="selectColor('#669900')" onmouseover="mouseOverColor('#669900')" alt="#669900">
                    <area style="cursor:pointer" shape="poly" coords="63,120,72,124,72,135,63,139,54,135,54,124" onclick="selectColor('#99FF33')" onmouseover="mouseOverColor('#99FF33')" alt="#99FF33">
                    <area style="cursor:pointer" shape="poly" coords="81,120,90,124,90,135,81,139,72,135,72,124" onclick="selectColor('#CCFF66')" onmouseover="mouseOverColor('#CCFF66')" alt="#CCFF66">
                    <area style="cursor:pointer" shape="poly" coords="99,120,108,124,108,135,99,139,90,135,90,124" onclick="selectColor('#FFFF99')" onmouseover="mouseOverColor('#FFFF99')" alt="#FFFF99">
                    <area style="cursor:pointer" shape="poly" coords="117,120,126,124,126,135,117,139,108,135,108,124" onclick="selectColor('#FFCC99')" onmouseover="mouseOverColor('#FFCC99')" alt="#FFCC99">
                    <area style="cursor:pointer" shape="poly" coords="135,120,144,124,144,135,135,139,126,135,126,124" onclick="selectColor('#FF9999')" onmouseover="mouseOverColor('#FF9999')" alt="#FF9999">
                    <area style="cursor:pointer" shape="poly" coords="153,120,162,124,162,135,153,139,144,135,144,124" onclick="selectColor('#FF6699')" onmouseover="mouseOverColor('#FF6699')" alt="#FF6699">
                    <area style="cursor:pointer" shape="poly" coords="171,120,180,124,180,135,171,139,162,135,162,124" onclick="selectColor('#FF3399')" onmouseover="mouseOverColor('#FF3399')" alt="#FF3399">
                    <area style="cursor:pointer" shape="poly" coords="189,120,198,124,198,135,189,139,180,135,180,124" onclick="selectColor('#CC3399')" onmouseover="mouseOverColor('#CC3399')" alt="#CC3399">
                    <area style="cursor:pointer" shape="poly" coords="207,120,216,124,216,135,207,139,198,135,198,124" onclick="selectColor('#990099')" onmouseover="mouseOverColor('#990099')" alt="#990099">
                    <area style="cursor:pointer" shape="poly" coords="36,135,45,139,45,150,36,154,27,150,27,139" onclick="selectColor('#666633')" onmouseover="mouseOverColor('#666633')" alt="#666633">
                    <area style="cursor:pointer" shape="poly" coords="54,135,63,139,63,150,54,154,45,150,45,139" onclick="selectColor('#99CC00')" onmouseover="mouseOverColor('#99CC00')" alt="#99CC00">
                    <area style="cursor:pointer" shape="poly" coords="72,135,81,139,81,150,72,154,63,150,63,139" onclick="selectColor('#CCFF33')" onmouseover="mouseOverColor('#CCFF33')" alt="#CCFF33">
                    <area style="cursor:pointer" shape="poly" coords="90,135,99,139,99,150,90,154,81,150,81,139" onclick="selectColor('#FFFF66')" onmouseover="mouseOverColor('#FFFF66')" alt="#FFFF66">
                    <area style="cursor:pointer" shape="poly" coords="108,135,117,139,117,150,108,154,99,150,99,139" onclick="selectColor('#FFCC66')" onmouseover="mouseOverColor('#FFCC66')" alt="#FFCC66">
                    <area style="cursor:pointer" shape="poly" coords="126,135,135,139,135,150,126,154,117,150,117,139" onclick="selectColor('#FF9966')" onmouseover="mouseOverColor('#FF9966')" alt="#FF9966">
                    <area style="cursor:pointer" shape="poly" coords="144,135,153,139,153,150,144,154,135,150,135,139" onclick="selectColor('#FF6666')" onmouseover="mouseOverColor('#FF6666')" alt="#FF6666">
                    <area style="cursor:pointer" shape="poly" coords="162,135,171,139,171,150,162,154,153,150,153,139" onclick="selectColor('#FF0066')" onmouseover="mouseOverColor('#FF0066')" alt="#FF0066">
                    <area style="cursor:pointer" shape="poly" coords="180,135,189,139,189,150,180,154,171,150,171,139" onclick="selectColor('#CC6699')" onmouseover="mouseOverColor('#CC6699')" alt="#CC6699">
                    <area style="cursor:pointer" shape="poly" coords="198,135,207,139,207,150,198,154,189,150,189,139" onclick="selectColor('#993366')" onmouseover="mouseOverColor('#993366')" alt="#993366">
                    <area style="cursor:pointer" shape="poly" coords="45,150,54,154,54,165,45,169,36,165,36,154" onclick="selectColor('#999966')" onmouseover="mouseOverColor('#999966')" alt="#999966">
                    <area style="cursor:pointer" shape="poly" coords="63,150,72,154,72,165,63,169,54,165,54,154" onclick="selectColor('#CCCC00')" onmouseover="mouseOverColor('#CCCC00')" alt="#CCCC00">
                    <area style="cursor:pointer" shape="poly" coords="81,150,90,154,90,165,81,169,72,165,72,154" onclick="selectColor('#FFFF00')" onmouseover="mouseOverColor('#FFFF00')" alt="#FFFF00">
                    <area style="cursor:pointer" shape="poly" coords="99,150,108,154,108,165,99,169,90,165,90,154" onclick="selectColor('#FFCC00')" onmouseover="mouseOverColor('#FFCC00')" alt="#FFCC00">
                    <area style="cursor:pointer" shape="poly" coords="117,150,126,154,126,165,117,169,108,165,108,154" onclick="selectColor('#FF9933')" onmouseover="mouseOverColor('#FF9933')" alt="#FF9933">
                    <area style="cursor:pointer" shape="poly" coords="135,150,144,154,144,165,135,169,126,165,126,154" onclick="selectColor('#FF6600')" onmouseover="mouseOverColor('#FF6600')" alt="#FF6600">
                    <area style="cursor:pointer" shape="poly" coords="153,150,162,154,162,165,153,169,144,165,144,154" onclick="selectColor('#FF5050')" onmouseover="mouseOverColor('#FF5050')" alt="#FF5050">
                    <area style="cursor:pointer" shape="poly" coords="171,150,180,154,180,165,171,169,162,165,162,154" onclick="selectColor('#CC0066')" onmouseover="mouseOverColor('#CC0066')" alt="#CC0066">
                    <area style="cursor:pointer" shape="poly" coords="189,150,198,154,198,165,189,169,180,165,180,154" onclick="selectColor('#660033')" onmouseover="mouseOverColor('#660033')" alt="#660033">
                    <area style="cursor:pointer" shape="poly" coords="54,165,63,169,63,180,54,184,45,180,45,169" onclick="selectColor('#996633')" onmouseover="mouseOverColor('#996633')" alt="#996633">
                    <area style="cursor:pointer" shape="poly" coords="72,165,81,169,81,180,72,184,63,180,63,169" onclick="selectColor('#CC9900')" onmouseover="mouseOverColor('#CC9900')" alt="#CC9900">
                    <area style="cursor:pointer" shape="poly" coords="90,165,99,169,99,180,90,184,81,180,81,169" onclick="selectColor('#FF9900')" onmouseover="mouseOverColor('#FF9900')" alt="#FF9900">
                    <area style="cursor:pointer" shape="poly" coords="108,165,117,169,117,180,108,184,99,180,99,169" onclick="selectColor('#CC6600')" onmouseover="mouseOverColor('#CC6600')" alt="#CC6600">
                    <area style="cursor:pointer" shape="poly" coords="126,165,135,169,135,180,126,184,117,180,117,169" onclick="selectColor('#FF3300')" onmouseover="mouseOverColor('#FF3300')" alt="#FF3300">
                    <area style="cursor:pointer" shape="poly" coords="144,165,153,169,153,180,144,184,135,180,135,169" onclick="selectColor('#FF0000')" onmouseover="mouseOverColor('#FF0000')" alt="#FF0000">
                    <area style="cursor:pointer" shape="poly" coords="162,165,171,169,171,180,162,184,153,180,153,169" onclick="selectColor('#CC0000')" onmouseover="mouseOverColor('#CC0000')" alt="#CC0000">
                    <area style="cursor:pointer" shape="poly" coords="180,165,189,169,189,180,180,184,171,180,171,169" onclick="selectColor('#990033')" onmouseover="mouseOverColor('#990033')" alt="#990033">
                    <area style="cursor:pointer" shape="poly" coords="63,180,72,184,72,195,63,199,54,195,54,184" onclick="selectColor('#663300')" onmouseover="mouseOverColor('#663300')" alt="#663300">
                    <area style="cursor:pointer" shape="poly" coords="81,180,90,184,90,195,81,199,72,195,72,184" onclick="selectColor('#996600')" onmouseover="mouseOverColor('#996600')" alt="#996600">
                    <area style="cursor:pointer" shape="poly" coords="99,180,108,184,108,195,99,199,90,195,90,184" onclick="selectColor('#CC3300')" onmouseover="mouseOverColor('#CC3300')" alt="#CC3300">
                    <area style="cursor:pointer" shape="poly" coords="117,180,126,184,126,195,117,199,108,195,108,184" onclick="selectColor('#993300')" onmouseover="mouseOverColor('#993300')" alt="#993300">
                    <area style="cursor:pointer" shape="poly" coords="135,180,144,184,144,195,135,199,126,195,126,184" onclick="selectColor('#990000')" onmouseover="mouseOverColor('#990000')" alt="#990000">
                    <area style="cursor:pointer" shape="poly" coords="153,180,162,184,162,195,153,199,144,195,144,184" onclick="selectColor('#800000')" onmouseover="mouseOverColor('#800000')" alt="#800000">
                    <area style="cursor:pointer" shape="poly" coords="171,180,180,184,180,195,171,199,162,195,162,184" onclick="selectColor('#993333')" onmouseover="mouseOverColor('#993333')" alt="#993333">
    		    </map>
    		</p>   
			<p id="color-select">
    			{!! Form::open() !!}
    			{!! Form::label('bg-color', 'Color: ') !!}
    			{!! Form::text('color', '', ['id' => 'bg-color']) !!}
    			{!! Form::close() !!}
    			
    		</p>
		</div>


      
      
      
      
        
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveBackground()" data-dismiss="modal">Save changes</button>
      </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->