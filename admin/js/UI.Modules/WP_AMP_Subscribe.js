function WP_AMP_THEMES_SUBSCRIPTION(){

    var JSObject = this;

    this.type = "wp_amp_themes_subscribe";

    this.container;
    this.form;
    this.DOMDoc;

    this.send_btn;
    this.display_btn;

	this.submitURL;


    this.init = function(){

		// save a reference to WMPJSInterface Object
        WATJSInterface = window.parent.WATJSInterface;
		console.log(WATJSInterface.localpath);

		// save references to buttons
        this.send_btn = jQuery('#'+this.type+'_send_btn',this.container).get(0);

        this.display_btn = jQuery('#'+this.type+'_display_btn',this.container).get(0);

        // save a reference to the FORM and remove the default submit action
        this.form = jQuery('#'+this.type+'_form',this.container).get(0);

		// add actions to send, cancel, ... buttons
        this.addButtonsActions();

        if (this.form == null){
            return;
        }

        // custom validation for FORM's inputs
        this.initValidation();
    }

	/**
	 * Custom validation.
	 */
    this.initValidation = function(){

        // this is the object that handles the form validations
	    this.validator = jQuery("#"+this.form.id, this.container).validate({

            rules: {
                wp_amp_themes_subscription_email: {
    		        required    : true,
					email		: true
    			}
            },

            messages: {
                wp_amp_themes_subscription_email: {
					email		: "Invalid e-mail address"
    			}
            },

	        // the errorPlacement has to take the table layout into account
	        // all the errors must be handled by containers/divs with custom ids: Ex. "error_fullname_container"
	        errorPlacement: function(error, element) {
	            var split_name = element[0].id.split("_");
                var id = (split_name.length > 1) ? split_name[ split_name.length - 1] : split_name[0];
                var errorContainer = jQuery("#error_"+id+"_container",JSObject.DOMDoc);
	            error.appendTo( errorContainer );
	        },

            errorElement: 'span'
	    });



        var $Email = jQuery('#'+this.type+'_email',this.container);
		$Email.data('holder',$Email.attr('placeholder'));
        $Email.focusin(function(){jQuery(this).attr('placeholder','');}).focusout(function(){jQuery(this).attr('placeholder',jQuery(this).data('holder'));});


    }

	/**
	 * Add actions to buttons.
	 */
    this.addButtonsActions = function(){



        jQuery(this.send_btn).unbind("click");
        jQuery(this.send_btn).bind("click",function(){
            JSObject.disableButton(this);
            JSObject.validate();

        })
        JSObject.enableButton(this.send_btn);




        jQuery(this.display_btn).unbind("click");
        jQuery(this.display_btn).bind("click",function(){

            JSObject.disableButton(this);

            jQuery(JSObject.form).show();
            jQuery(JSObject.actionBox).hide();
        })
        JSObject.enableButton(this.display_btn);

		jQuery("#"+JSObject.form.id,JSObject.DOMDoc).bind("keypress", function (e) {
			if (e.keyCode == 13) return false;
		});

    }

	/**
	 * Enable buttons.
	 */
    this.enableButton = function(btn){
        jQuery(btn).css('cursor','pointer');
        jQuery(btn).animate({opacity:1},100);

    }


	/**
	 * Disable button.
	 */
    this.disableButton = function(btn){
        jQuery(btn).unbind("click");
        jQuery(btn).animate({opacity:0.4},100);
        jQuery(btn).css('cursor','default');
    }


	/**
	 * Validate data.
	 */
    this.validate = function(){

        jQuery(this.form).validate().form();

        // y coordinates of error inputs
        var arr_errorsYCoord = [];

        // find the y coordinate for the errors
        for (var name in this.validator.invalid){
            var input = jQuery(this.form[name]);
            arr_errorsYCoord.push(input.offset().top);
        }

        // if there are no errors from syntax point of view, then send data
        if (arr_errorsYCoord.length == 0){

            //send data
            JSObject.sendData();
        }
        //move container(div) scroll to the first error
        else{

            // add actions to send, cancel, ... buttons. At this moment the buttons are disabled.
            JSObject.addButtonsActions();
        }
    }


	/**
	 * Send data to endpoint.
	 */
	this.sendData = function(){

		WMPJSInterface.Preloader.start();

		jQuery.ajax({
			url: JSObject.submitURL,
			type: 'post',
			data: {
				'email':    jQuery("#"+JSObject.type+"_email", JSObject.container).val(),
				'list':     JSObject.listType
			},
			dataType: 'jsonp',
			success: function(responseJSON){

                WATJSInterface.Preloader.remove(100);

                var JSON = eval(responseJSON);
				var response = Number(String(JSON.status));

				if (response == 0) {

					var message = 'There was an error. Please reload the page and try again in few seconds or contact the plugin administrator if the problem persists.';
					WATJSInterface.Loader.display({message: message});

                    // reset form
    				JSObject.form.reset();

    				//enable form elements
    				setTimeout(function(){
    								var aElems = JSObject.form.elements;
    								nElems = aElems.length;
    								for (j=0; j<nElems; j++) {
    									aElems[j].disabled = false;
    								}
    							},300);

    				//enable buttons
    				JSObject.addButtonsActions();

				} else {

                    // successfully joined list (response = 1) or already joined (response = 2)
                    WMPJSInterface.Loader.display({message: JSON.message});

                    jQuery(JSObject.form).hide();
                    jQuery("#"+JSObject.type + "_added", JSObject.container).show();

                    // make request to settings endpoint to mark the wailist as joined
                    if (response == 1 || response == 2) {

                        jQuery.post(
                            ajaxurl,
                            {
                                'action': 'wp_amp_themes_subscribe',
                            },
                            function(response1){
                            }
                        );
                    }

                }

			},
			error: function(responseJSON){
			}
        });

	}

}
