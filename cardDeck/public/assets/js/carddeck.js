jQuery(document).ready(function(){
    jQuery("#create_btn").live("click" , function() {
        userName = jQuery("#user_create").val();
        if( userName != "" ) {
            jQuery.ajax({
                'url' : "/default/createUser",
                'type' : "POST",
                'dataType' : "json",
                'data' : { username : userName },
                'success' : function ( data ) {
                    if( data.success != true ) {
                        alert( data.error );
                    } else {
                        jQuery( "div#user_panel").html( data.html );
                        alert( "User Successfully Added." )
                        location.href = "http://" + location.hostname;
                    }
                }
            });
        }
    } );
    jQuery("#user_select").live("change" , function() {
        userId = jQuery(this).val();
        if( userId != "" ) {
            jQuery("#user_select").attr( "user_id" , userId );
            jQuery.ajax({
                'url' : "/default/getUsersDeck",
                'type' : "POST",
                'dataType' : "json",
                'data' : { userid : userId },
                'success' : function ( data ) {
                    if( data.success != true ) {
                        alert( data.error );
                    } else {
                        jQuery( "div#content").html( data.html );
                    }
                }
            });
        }
    });

    jQuery("#create_deck_btn").live("click" , function() {
        userId = jQuery("#user_select").attr( "user_id" );
        deckName = jQuery.trim( jQuery("#deck_name").val() );
        if( deckName != "" && userId != "" ) {
            jQuery.ajax({
                'url' : "/default/createUserDeck",
                'type' : "POST",
                'dataType' : "json",
                'data' : { userid : userId, deckname : deckName },
                'success' : function ( data ) {
                    if( data.success != true ) {
                        alert( data.error );
                    } else {
                        jQuery( "li#deck_selection").html( data.html );
                        alert( "User Deck Successfully Added." )
                    }
                }
            });
        }
    });
    jQuery("#user_deck").live("change" , function() {
        deckId = jQuery(this).val();
        if( deckId != "" ) {
            jQuery( "li#current_deck_container").attr( "deck_id", deckId );
            jQuery.ajax({
                'url' : "/default/getCurrentDeck",
                'type' : "POST",
                'dataType' : "json",
                'data' : { deckid : deckId },
                'success' : function ( data ) {
                    if( data.success != true ) {
                        alert( data.error );
                    } else {
                        jQuery( "li#current_deck_container").html( data.html );
                    }
                }
            });
        }
    });
    jQuery("div#current_deck div.card_container").live("mouseover", function(){
        if( jQuery(this).find(".card_btns").length > 0 ) {
            jQuery(this).find(".card_btns").css("display","block")
        }
    }).live("mouseout" , function(){
            if( jQuery(this).find(".card_btns").length > 0 ) {
                jQuery(this).find(".card_btns").css("display","none")
            }
        });
    jQuery("button#select_card, button#change_card").live("click",function(){
        jQuery( "table#all_cards").attr( "data_carddeck_ref" , jQuery( this ).attr( "deckcard_id" ) );
        jQuery("div#card_selection").dialog({
            resizable: false,
            height: 450,
            width: 650,
            modal : true
        });
    });
    jQuery("table#all_cards tbody tr").live("click",function(){
        vals = [];
        var cardId;
        jQuery(this).find("td").each(function(){
            if( jQuery(this).find("span").length > 0 ) {
                cardId = jQuery(this).find("span").attr("card_id");
                if( jQuery.trim( jQuery(this).find("span").html() ) != "" ) {
                    vals.push( jQuery(this).find("span").html() );
                }
            } else {
                if( jQuery.trim( jQuery(this).html() ) != "" ) {
                    vals.push( jQuery(this).html() );
                }
            }
        });
        y = confirm( "Would you like to select this card '" + vals.join( " -- " ) + "' ?" );
        if( y ) {
            if( jQuery("#user_select").attr( "user_id" ) == "" ) {
                alert( "No User Selected." ); return false;
            }
            if( jQuery( "li#current_deck_container").attr( "deck_id" ) == "" ) {
                alert( "No Deck Selected." ); return false;
            }
            jQuery.ajax({
                'url' : "/default/saveCardDeckInfo",
                'type' : "POST",
                'dataType' : "json",
                'data' : { deckid : jQuery( "li#current_deck_container").attr( "deck_id" ) ,
                    cardid : cardId,
                    deckcardid : jQuery( "table#all_cards").attr( "data_carddeck_ref")
                },
                'success' : function ( data ) {
                    if( data.success != true ) {
                        alert( data.error );
                    } else {
                        jQuery( "li#current_deck_container").html( data.html );
                        jQuery("div#card_selection").dialog('close');
                    }
                }
            });
        }
    });
    jQuery("button#card_generate_btn").live("click",function(){
        numcards = jQuery("input#number_of_cards").val();
        if( jQuery.trim( numcards ) != "" && parseInt( numcards ) > 0 ) {
            jQuery.ajax({
                'url' : "/default/generateCards",
                'type' : "POST",
                'dataType' : "json",
                'data' : { count : numcards },
                'success' : function ( data ) {
                    if( data.success != true ) {
                        alert( data.error );
                    } else {
                        alert( numcards + " Card(s) Successfully Created." );
                        location.href = "http://" + location.hostname;
                    }
                }
            });
        }
    });
    jQuery("button#skill_generate_btn").live("click",function(){
        skillName = jQuery("input#skill_name").val();
        if( jQuery.trim( skillName ) != "" ) {
            jQuery.ajax({
                'url' : "/default/createSkill",
                'type' : "POST",
                'dataType' : "json",
                'data' : { skillname : skillName },
                'success' : function ( data ) {
                    if( data.success != true ) {
                        alert( data.error );
                    } else {
                        alert( "Skill : '" + skillName + "' Successfully Created." );
                        location.href = "http://" + location.hostname;
                    }
                }
            });
        }
    });
});