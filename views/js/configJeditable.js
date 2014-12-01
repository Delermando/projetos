$(document).ready(function() {   
    $(function () {
        $(".dblclick").editable("actions/actEditarUsersPagAdmin.php", {
            indicator: "<img src='views/images/indicator.gif'>",
            tooltip: "Clique duas vezes para editar...",
            event: "dblclick",
        });
    });
});