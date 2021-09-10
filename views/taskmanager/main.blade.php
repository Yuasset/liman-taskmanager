<div id="task_list"></div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
]),
<div id="fileLocationContent"></div>
@endcomponent

@component("modal-component", [
    "id" => "serviceStatusModal",
    "title" => "Servis Durumu",
    "notSized" => "true"
]),
<div id="serviceStatus"></div>
@endcomponent

@component("modal-component", [
    "id" => "processTreeModal",
    "title" => "İşlem Ağacı",
    "notSized" => "true"
])
<div id="processTree"></div>
@endcomponent

@include("taskmanager.scripts")