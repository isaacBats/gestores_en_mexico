$(document).ready(function () {
    var url = $.url();
    $("#btn-buscador").click(function () {
        $("#bootpag_text_count").submit();

    });
    $("#bootpag_text_count_select").change(function () {
        $("#bootpag_text_count").submit();
    });

    if (url.param('numpp') != null) {
        $('#bootpag_text_count_select').val(url.param('numpp'));
    }
    if (url.param('estado') != null) {
        $('#estados').val(url.param('estado'));
    }
    if (url.param('municipio') != null) {
        $('#cuponMunicipio').val(url.param('municipio'));
    }
     
    setNavigation();
    getBootPage();
    selectCountSelect();
});
function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
    $(".nav-sidebar a").each(function () {
        var href = $(this).attr('href');
        if (path == href) {
            $(this).parent().addClass('active');
        }
    });
}
function getBootPage() {
    var url = $.url();
    var current = (url.param('page') == null) ? 1 : url.param('page');
    var count = $('#bootpag_pag').attr('data-count');
    var numpp = (url.param('numpp') == null) ? 10 : url.param('numpp');
    count = (count % numpp == 0) ? Math.floor(count / numpp) : Math.floor(count / numpp) + 1;
    $('#bootpag_pag').bootpag({
        total: count,
        page: current,
        maxVisible: 4,
        leaps: true,
        firstLastUse: true,
        first: '<',
        last: '>',
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
    }).on("page", function (event, num) {
        $("#current_page").val(num);
        $("#bootpag_text_count").submit();
    });
}
function selectCountSelect() {
    var url = $.url();
    var selec = (url.param('numpp') == null) ? 10 : url.param('numpp');
    $("#bootpag_text_count_select").val(selec);
}