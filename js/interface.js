var $response;
var $search;

$( document ).ready( ()=>{
    $response = $( ".response" );
    $search = $( ".search-string" );
    $( ".input-form" ).on( "submit", ( e )=>{
        e.preventDefault();
        search_text = $search.val()
        update( search_text );
    });
});


//refresh responce block
function update( search_string ){
    if( ! search_string )
        return false;
    
    $.ajax({
        type: "GET",
        url: "templates.php",
        data: { request: search_string },
        success: function( data ){
            if( data ){
                clear_response();
                if( typeof( data ) !== "object" ){
                    console.error( "Wrong response!!" );
                    return;
                }
                data.forEach(( el )=>{
                    create_element( el.title, el.text );
                });
            }
            else
                create_element( "Nothing", "There is absolutely nothing" );
        },
        dataType: 'json',
        error: function ( msg ) {
            console.error( msg.responseText );
        }
    })
}


//create one element as the response entry 
function create_element( title, text ){

    $wrapper = $( "<div>", {class: "response__element"} );
    $title = $( "<div>", {class: "element__header"} );
    $title.html( title );
    $text = $( "<div>", {class: "element__body"} );
    $text.html( text );

    $wrapper.append( $title );
    $wrapper.append( $text );
    
    $response.append( $wrapper );
}


//clear response div
function clear_response(){
    $response.html("");
}
