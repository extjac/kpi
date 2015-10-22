var User = (function () {

    // Create & Update
    var store = function ( e ) 
    {
        e.preventDefault();
        
        var form = $(this);      
        var $btn  = form.find('button[type="submit"]').button('loading');// Please wait... message

        $.ajax({
            url     : api + form.attr('action'),
            type    : form.find('input[name="_method"]').val() || 'POST' ,
            data    : form.serialize(),
            dataType: 'json',
            success : function( json )
            {
                table.api().ajax.reload();//update table values
                $('.modal').modal('hide');//hide modal
            },
            error   : function ( jqXhr, json, errorThrown ) 
            {
                if( jqXhr.status == 422)  //  if validation failed
                {    
                    var errors = jqXhr.responseJSON;//get Larevel errors
                    var errorsHtml ='';                  
                    $.each( errors, function( key, value ) 
                    {
                        errorsHtml += '<li class="red">' + value[0] + '</li>'; 
                    });
                    $('.showError').html( errorsHtml );//show error messages 
                }
            }
        }).always(function(){
            $btn.button('reset');
        });
    };


    var show = function ( e ) 
    {
        e.preventDefault();

        $.get( api + $(this).data('url'), function( data ) 
        {
           $('#_method').val( 'PUT' );
           $('#id').val( data.id );
           $('#first_name').val( data.first_name );
           $('#last_name').val( data.last_name );
           $('#email').val( data.email );
           $('#active').val( data.active );
        });        

        $('#modal-user').modal('show');

    };

    var destroy = function ( e ) 
    {
        e.preventDefault();
 
        if( confirm('Are you sure?') ) 
        {
          $.post( api + $(this).data("url"), { _method: 'DELETE' } )
            .done(function( data ) {
                table.api().ajax.reload();//reload table
          });          
          return false;
        }
    };

    return {

        init: function ()  
        {
            // create & update
            $('.ajax-form-user').on('submit', store ); 
            // show
            $('#table').on('click', '.edit-user-id', show ) ;
            // remove
            $('#table').on('click', '.remove-user-id', destroy ) 
       }
    }

})();

User.init();