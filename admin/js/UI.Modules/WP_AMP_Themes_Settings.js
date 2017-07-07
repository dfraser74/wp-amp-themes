function WP_AMP_THEMES_SETTINGS() {

  var JSObject = this;

  this.type = 'wp_amp_themes_settings';

  this.form;
  this.DOMDoc;

  this.send_btn;


   /**
	* Init function called from WATJSInterface
	*/
  this.init = function () {

    // save a reference to WATJSInterface Object
    WATJSInterface = window.parent.WATJSInterface;

    // save a reference to "SEND" Button
    this.send_btn = jQuery('#' + this.type + '_send_btn', this.DOMDoc).get(0);

    // save a reference to the FORM and remove the default submit action
    this.form = this.DOMDoc.getElementById(this.type + '_form');

    // add actions to send, cancel, ... buttons
    this.addButtonsActions();

    if (this.form == null) {
      return;
    }

  };

  /**
   * Function that controls the actions of the send button.
   */
  this.addButtonsActions = function () {

    jQuery(this.send_btn).unbind('click');
    jQuery(this.send_btn).bind('click', function () {
      JSObject.disableButton(this);
      JSObject.sendData();
    });
    JSObject.enableButton(this.send_btn);

  };

  /**
   * Function used to enable button after sending data.
   */
  this.enableButton = function (btn) {
    jQuery(btn).css('cursor', 'pointer');
    jQuery(btn).animate({ opacity: 1 }, 100);
  };


  /**
   * Function used to disable button while sending data.
   */
  this.disableButton = function (btn) {
    jQuery(btn).unbind('click');
    jQuery(btn).animate({ opacity: 0.4 }, 100);
    jQuery(btn).css('cursor', 'default');
  };

  /**
   * Function that submits the form through an iframe as a target.
   */
  this.submitForm = function () {
    return WATJSInterface.AjaxUpload.dosubmit(JSObject.form, { 'onStart': JSObject.startUploadingData, 'onComplete': JSObject.completeUploadingData });
  };


  /**
   * Function that sends the form data.
   */
  this.sendData = function () {

    jQuery('#' + this.form.id, this.DOMDoc).unbind('submit');
    jQuery('#' + this.form.id, this.DOMDoc).bind('submit', function () { JSObject.submitForm(); });
    jQuery('#' + this.form.id, this.DOMDoc).submit();

    JSObject.disableButton(JSObject.send_btn);
  };


  /**
   * Function that starts uploading the data.
   */
  this.startUploadingData = function () {

    WATJSInterface.Preloader.start();

    //disable form elements
    setTimeout(function () {
      var aElems = JSObject.form.elements;
      nElems = aElems.length;

      for (j = 0; j < nElems; j++) {
        aElems[j].disabled = true;
      }
    }, 300);

    return true;
  };


  /**
   * Function that runs once the data upload is complete.
   */
  this.completeUploadingData = function (responseJSON) {

    jQuery('#' + JSObject.form.id, JSObject.DOMDoc).unbind('submit');
    jQuery('#' + JSObject.form.id, JSObject.DOMDoc).bind('submit', function () { return false; });

    // remove preloader
    WATJSInterface.Preloader.remove(100);

 		var parsedJSON = JSON.parse(responseJSON);
    var response = Boolean(Number(String(parsedJSON.status)));


		WATJSInterface.Loader.display({ message: parsedJSON.message });

    // enable form elements
    setTimeout(function () {
      var aElems = JSObject.form.elements;
      nElems = aElems.length;
      for (j = 0; j < nElems; j++) {
        aElems[j].disabled = false;
      }
    }, 300);

    //enable buttons
    JSObject.addButtonsActions();
  };

}
