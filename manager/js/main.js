'use strict';

// ------------------------------------
// HELPER FUNCTIONS TO TEST FOR SPECIFIC DISPLAY SIZE (RESPONSIVE HELPERS)
// ------------------------------------

function is_display_type(display_type) {
  return $('.display-type').css('content') == display_type || $('.display-type').css('content') == '"' + display_type + '"';
}
function not_display_type(display_type) {
  return $('.display-type').css('content') != display_type && $('.display-type').css('content') != '"' + display_type + '"';
}

// Initiate on click and on hover sub menu activation logic
function os_init_sub_menus() {

  // INIT MENU TO ACTIVATE ON HOVER
  var menu_timer;
  $('.menu-activated-on-hover').on('mouseenter', 'ul.main-menu > li.has-sub-menu', function () {
    var $elem = $(this);
    clearTimeout(menu_timer);
    $elem.closest('ul').addClass('has-active').find('> li').removeClass('active');
    $elem.addClass('active');
  });

  $('.menu-activated-on-hover').on('mouseleave', 'ul.main-menu > li.has-sub-menu', function () {
    var $elem = $(this);
    menu_timer = setTimeout(function () {
      $elem.removeClass('active').closest('ul').removeClass('has-active');
    }, 30);
  });

  // INIT MENU TO ACTIVATE ON CLICK
  $('.menu-activated-on-click').on('click', 'li.has-sub-menu > a', function (event) {
    var $elem = $(this).closest('li');
    if ($elem.hasClass('active')) {
      $elem.removeClass('active');
    } else {
      $elem.closest('ul').find('li.active').removeClass('active');
      $elem.addClass('active');
    }
    return false;
  });
}

$(function () {

  // #1. CHAT APP

  $('.floated-chat-btn, .floated-chat-w .chat-close').on('click', function () {
    $('.floated-chat-w').toggleClass('active');
    return false;
  });

  $('.message-input').on('keypress', function (e) {
    if (e.which == 13) {
      $('.chat-messages').append('<div class="message self"><div class="message-content">' + $(this).val() + '</div></div>');
      $(this).val('');
      var $messages_w = $('.floated-chat-w .chat-messages');
      $messages_w.scrollTop($messages_w.prop("scrollHeight"));
      $messages_w.perfectScrollbar('update');
      return false;
    }
  });

  $('.floated-chat-w .chat-messages').perfectScrollbar();

  
});

$.post('/path/to/file', {param1: 'value1'}, function(data, textStatus, xhr) {
  /*optional stuff to do after success */
});