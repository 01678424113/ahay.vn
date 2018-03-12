//Xử lí ảnh truyện
var book1 = new Heidelberg($('#Heidelberg-example-1'), {
    /* previousButton: $('#previous'),
     nextButton: $('#next'),*/
    hasSpreads: true,
    onPageTurn: function (el, els) {
        console.log('Page turned');
    },
    onSpreadSetup: function (el) {
        console.log('Spread setup');
    }
});
$('#previous').on('click', function () {
    $('.popover').hide();
    $('.btn-change-story').hide();
    book1.turnPage(1);
});
$('#next').on('click', function () {
    $('.popover').hide();
    $('.jump').removeClass('active-word');
    $('.img-thumbnails-word').removeClass('active-thumbnail');
    $('.btn-change-story').hide();
    var data_page_last = $(this).attr('data-page-last');
    console.log(data_page_last);
    data_page_last = parseInt(data_page_last) + 4;
    book1.turnPage(data_page_last);
});
$('.jump').on('click', function () {
    var data_word_id = $(this).attr('data-word-id');
    var data_thumbnail = $(this).attr('data-thumbnail');
    var thumbnail_id = '#' + data_thumbnail;

    $('.preview-word-comic .jump').removeClass('active-word');
    $('.thumbnails-comic-word .img-thumbnails-word').removeClass('active-thumbnail');
    $('.popover').hide();
    $('.btn-change-story').hide();

    $(this).addClass('active-word');
    $(thumbnail_id).addClass('active-thumbnail');
    data_word_id = parseInt(data_word_id) + 4;
    book1.turnPage(data_word_id);
});
$('.img-thumbnails-word').on('click', function () {
    var data_word_id = $(this).attr('data-word-id');
    var data_thumbnail = '.' + $(this).attr('id');
    $('.preview-word-comic .jump').removeClass('active-word');
    $('.thumbnails-comic-word .img-thumbnails-word').removeClass('active-thumbnail');
    $('.btn-change-story').hide();
    $('.popover').hide();
    $(this).next().show();
    $(this).addClass('active-thumbnail');
    $(data_thumbnail).addClass('active-word');
    $('.Heidelberg-Book').attr('style', 'left:0');
    data_word_id = parseInt(data_word_id) + 4;
    book1.turnPage(data_word_id);
});
$('.Heidelberg-Page').click(function () {
    var page_active = $('.is-active .Heidelberg-Spread img').attr('data-thumbnail-page');
    //Xu li an hien nut thay doi truyen
    var stt = $('.is-active .Heidelberg-Spread img').attr('class');
    if (typeof(stt) != "undefined" && stt !== null) {
        var id_story = parseInt(stt.substring(6, stt.length - 2));
        stt = parseInt(stt.substring(stt.length - 1, stt.length));
        $('.btn-change-story').hide();
        if (stt === 2) {
            $("#popover-" + id_story).show();
        }else{
            $("#popover-" + id_story).hide();
        }
    }
    $('.jump').removeClass('active-word');
    $("." + page_active).addClass('active-word');
    $('.img-thumbnails-word').removeClass('active-thumbnail');
    $("#" + page_active).addClass('active-thumbnail');

});
$('.first-page').click(function () {
    var data_thumbnail_page_class = '.' + $(this).children().attr('data-thumbnail-page');
    var data_thumbnail_page_id = '#' + $(this).children().attr('data-thumbnail-page');
    $('.jump').removeClass('active-word');
    $(data_thumbnail_page_class).addClass('active-word');
    $('.img-thumbnails-word').removeClass('active-thumbnail');
    $(data_thumbnail_page_id).addClass('active-thumbnail');
});
$('.last-page').click(function () {
    var data_thumbnail_page_class = '.' + $(this).children().attr('data-thumbnail-page');
    var data_thumbnail_page_id = '#' + $(this).children().attr('data-thumbnail-page');
    $('.jump').removeClass('active-word');
    $(data_thumbnail_page_class).addClass('active-word');
    $('.img-thumbnails-word').removeClass('active-thumbnail');
    $(data_thumbnail_page_id).addClass('active-thumbnail');
});
//End xử lí ảnh truyện

//Xử lí JS cho nav comic
$('.background-hiden').hide();
$('#info-preview-comic-name').hide();
$('#info-preview-comic-message').hide();
$('.info-preview-comic-name .fa-chevron-up').hide();
$('.info-preview-comic-message .fa-chevron-up').hide();

$('.info-preview-comic-name').click(function () {
    var status_name = $('#info-preview-comic-name').attr('style');
    if (status_name === 'display: none;') {
        $('.btn-change-story').hide();
        $('.popover').hide();
        $('#info-preview-comic-message').hide();
        $('#info-preview-comic-name').show(1);
        $('.background-hiden').css('display', 'block');
        $('.info-preview-comic-name .fa-chevron-up').show();
        $('.info-preview-comic-name .fa-chevron-down').hide();
        $('.info-preview-comic-message').css('background', 'white');
        $('.info-preview-comic-name').css('background', '#f9f9f9');
    } else {
        $('#info-preview-comic-name').hide(1);
        $('.background-hiden').css('display', 'none');
        $('.info-preview-comic-name .fa-chevron-up').hide();
        $('.info-preview-comic-name .fa-chevron-down').show();
        $('.info-preview-comic-name').css('background', 'white');
    }
});
$('.info-preview-comic-message').click(function () {
    var status_message = $('#info-preview-comic-message').attr('style');
    if (status_message === 'display: none;') {
        $('.btn-change-story').hide();
        $('.popover').hide();
        $('#info-preview-comic-name').hide();
        $('#info-preview-comic-message').show(1);
        $('.background-hiden').css('display', 'block');
        $('.info-preview-comic-message .fa-chevron-up').show();
        $('.info-preview-comic-message .fa-chevron-down').hide();
        $('.info-preview-comic-name').css('background', 'white');
        $('.info-preview-comic-message').css('background', '#f9f9f9');
    } else {
        $('#info-preview-comic-message').hide(1);
        $('.background-hiden').css('display', 'none');
        $('.info-preview-comic-message .fa-chevron-up').hide();
        $('.info-preview-comic-message .fa-chevron-down').show();
        $('.info-preview-comic-message').css('background', 'white');
    }
});
$('.btn-save-info-comic,.btn-save-message-comic').click(function () {
    $('.background-hiden').hide();
    $('#info-preview-comic-name').hide();
    $('#info-preview-comic-message').hide();
    $('.info-preview-comic-name .fa-chevron-up').hide();
    $('.info-preview-comic-message .fa-chevron-up').hide();
});
//End js cho nv comic

// Auto sửa và thêm thuộc tính submit form preview cho btn-save-info-comic
$('input[name=comic_gender]').change(function () {
    var comic_gender = $(this).val();
    $('#preview-form input[name=comic_gender]').val(comic_gender);
});
// End auto sửa và thêm thuộc tính submit form preview