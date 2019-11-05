$(document).ready(function() {

        // console.log($('.custom-file-input').parent().parent().find('img').attr('src'));
        // setTimeout(function(){
        //     $('.custom-file-input').each(function(){
        //         var srcImg = $(this).parent().parent().find('img').attr('src')
        //         console.log(srcImg);
        //         $(this).attr('value', srcImg);
        //         $(this).change();
        //         console.log($(this).val());
                
        //     });

        // },0);

    $(".add-new-file").click(function(){

        $('.increment.clone').clone().first().addClass('increment-cloned').appendTo('.multiple-files');
        $('.increment-cloned .custom-file-input').attr('name', 'image[]');
        $('.increment-cloned .custom-text-input').attr('name', 'text_image[]');
        $('.increment-cloned .custom-check-input').attr('name', 'full_image[]');
        $('.increment-cloned .custom-file-input + input').remove();
        $('.increment-cloned').removeClass('d-none');

        // var html = $(".clone").html();
        // $(".increment").after(html);
    });

    $("body").on("click",".project-form .btn-danger",function(){ 
        $(this).parent().remove();
    });

    $(document).on('click', '.custom-file-input', function(){
        console.log($(this));
        $(this).on('change',function(){
            var fileName = $(this).val();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        })
    });



});