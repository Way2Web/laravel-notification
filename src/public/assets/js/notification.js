/**
 * Notification function
 * @package notification
 * @author Gertjan Roke <groke@intothesource.com>
 */

var Notification = {

    success: function(message, title, important)
    {
        title = typeof title !== 'undefined' ? title : 'Success';
        Notification.message(message, title, 'success', important);
    },

    warning: function(message, title, important)
    {
        title = typeof title !== 'undefined' ? title : 'Warning';
        Notification.message(message, title, 'warning', important);
    },

    error: function(message, title, important)
    {
        title = typeof title !== 'undefined' ? title : 'Error';
        Notification.message(message, title, 'danger', important);
    },

    info: function(message, title, important)
    {
        title = typeof title !== 'undefined' ? title : 'Info';
        Notification.message(message, title, 'info', important);
    },

    overlay: function(message, title, btnText)
    {
        if(typeof message != 'string' && typeof title != 'string' && btnText != 'string') {
            return false;
        }
        var html =  '<div id="flash-overlay-modal-js" class="modal fade flash-modal">'+
                        '<div class="modal-dialog">'+
                            '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                    '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
                                    '<h4 class="modal-title">'+title+'</h4>'+
                                '</div>'+
                                '<div class="modal-body">'+
                                    '<p>'+message+'</p>'+
                                '</div>'+
                                '<div class="modal-footer">'+
                                    '<button type="button" class="btn btn-default" data-dismiss="modal">'+btnText+'</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        $('.notifications').append(html);
        $('#flash-overlay-modal-js').modal('show');
    },

    message: function(message, title, type, important) {
        if(important) {
            important = ' important';
        } else {
            important = '';
        }
        var html = '<div class="alert alert-'+type + important+'"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';

        if(title) {
            html += '<p class="alert-title">'+title+'</p><hr>';
        }

        if(jQuery.isArray(message)) {
            message.map(function(value, index) {
                if(jQuery.isPlainObject(value)) {
                    html += '<p class="alert-title with-list">'+Object.getOwnPropertyNames(value).toString()+'</p>';
                    html += '<ul>';
                    for (var m in value){
                        value[m].map(function(string) {
                             html += '<li>'+string+'</li>';
                        });
                    }
                    html += '</ul>';
                } else {
                    html += '<p class="alert-message single">'+value+'</p>';
                }
            });
        } else if(jQuery.isPlainObject(message)) {
            html += '<p class="alert-title with-list">'+Object.getOwnPropertyNames(message).toString()+'</p>';
            html += '<ul>';
            for (var m in message){
                message[m].map(function(string) {
                     html += '<li>'+string+'</li>';
                });
            }
            html += '</ul>';
        } else {
            html += '<p class="alert-message single">'+message+'</p>';
        }
        html += '</div>';
        // adding the html to your screen
        $('.notifications').append(html);
    }
}
