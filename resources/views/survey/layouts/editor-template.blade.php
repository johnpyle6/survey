<li id="editor-template" role="template">
    {{--<div class="content-edit-buttons" id="ed-cont-btns-{{ $content->id }}">
        <div class="btn btn-default editBtn" onclick="tools.detachContentFromSurvey({{ $content->id }})">
            <span class="glyphicon glyphicon-trash"></span>
        </div>&nbsp;
        <div class="btn btn-default editBtn tagContent" >
            <span class="glyphicon glyphicon-tag tagContent"></span>
        </div>
        <div class="btn btn-default editBtn" onclick="toggleEditor({{ $content->id }})">
            <span class="glyphicon glyphicon-pencil"></span>
        </div>
    </div> --}}
    <div class="ed-comp" id="editor-template-div1">
        <textarea></textarea>
        <br>
        <button class="btn btn-primary" id="editor-save-btn">save</button>
        <button class="btn"  id="editor-cancel-btn">cancel</button>
    </div>
    <div class="ed-cont" id="editor-template-div2">
        <div class="btn btn-default editBtn"  id="editor-delete-btn">
            <span class="glyphicon glyphicon-trash"></span>
        </div>
        <div class="btn btn-default editBtn" id="editor-edit-btn" onclick="tools.editText(1)">
            <span class="glyphicon glyphicon-pencil"></span>
        </div>
        <div id="container"></div>
    </div>
</li>