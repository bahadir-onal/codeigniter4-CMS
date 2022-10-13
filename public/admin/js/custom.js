/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).on('click', '.contact-phone-add', function (e){
    let clone = $('#contact-phone-field').clone()
    let name = $(this).data('name')
    let count = $(this).closest('.card-body').find('.phone-field').length;
    let number = count+1;
    clone = $(clone).css('display', 'flex');
    clone.removeAttr('id');
    clone.find('#phone-name').attr('name', 'contact['+name+'][phones][phone'+number+'][name]');
    clone.find('#phone-number').attr('name', 'contact['+name+'][phones][phone'+number+'][number]');
    $(this).closest('.collapse').find('#contact-phone-area').append(clone);
});

$(document).on('click', '.contact-email-add', function (e){
    let clone = $('#contact-email-field').clone()
    let name = $(this).data('name')
    let count = $(this).closest('.card-body').find('.email-field').length;
    let number = count+1;
    clone = $(clone).css('display', 'flex');
    clone = clone.removeAttr('id');
    clone.find('#email-name').attr('name',  'contact['+name+'][emails][email'+number+'][name]');
    clone.find('#email-email').attr('name', 'contact['+name+'][emails][email'+number+'][email]');
    $(this).closest('.collapse').find('#contact-email-area').append(clone);
});

$(document).on('click', '.contact-phone-remove', function (e){
    $(this).closest('.phone-field').remove();
});

$(document).on('click', '.contact-email-remove', function (e){
    $(this).closest('.email-field').remove();
});

$(document).on('click', '.office-remove', function (e){
    $(this).closest('.card').remove();
});