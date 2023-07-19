define([
    'jquery',
    'Magento_Customer/js/model/authentication-popup',
    'Magento_Ui/js/modal/modal',
    'Magento_Customer/js/customer-data'
], function ($, authenticationPopup, modal, customerData
) {
    'use strict';
    
    return function (Component) {
        return Component.extend({

            /**
             * @override
             */
            getCartParam: function (name) {
                var self = this;

                const showPopup = (event) => {
                    event.preventDefault();
                    var customer = customerData.get('customer');
                    if (customer().firstname) {
                        var options = {
                            type: 'popup',
                            responsive: true,
                            innerScroll: true,
                            modalClass: 'custom-modal-class',
                            buttons: [{
                                text: $.mage.__('Close'),
                                class: 'mymodal-close',
                                click: function() {
                                    this.closeModal();
                                }
                            }]
                        };

                        var popup = modal(options, $('#customModal'));
                        $("#customModal").modal("openModal");
                        return false;
                    }
                }

                if(name === 'possible_onepage_checkout'){                           
                    $('#top-cart-btn-checkout').on('click',showPopup);
                };
                
                

                return this._super(name);
            },
        });
    }
});