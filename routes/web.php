<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', 'ListController@show');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'Members\ListMembersController@index')->name('members_list');
Route::post('/home/delete', 'Members\ListMembersController@delete')->name('delete_members_list');

//Members
Route::get('/home/members/create', 'Members\CreateMemberControllers@getCreateMember')->name('create_member');
Route::get('/home/members/{id}/edit', 'Members\EditMemberController@getMember')->name('member_edit');
Route::post('/home/members', 'Members\CreateMemberControllers@create')->name('post_create_member');
Route::post('/home/members/createandnew', 'Members\CreateMemberControllers@createAndNew')->name('post_create_and_new_member');
Route::put('/home/members/edit', 'Members\EditMemberController@update')->name('post_member_edit');

//Event Types
Route::get('/home/event_types', 'EventTypes\ListController@index')->name('event_types_list');
Route::get('/home/event_types/create', 'EventTypes\CreateController@get')->name('create_event_types');
Route::get('/home/event_types/{id}/edit', 'EventTypes\EditController@get')->name('edit_event_types');
Route::post('/home/event_types', 'EventTypes\CreateController@create')->name('post_create_event_types');
Route::put('/home/event_types/edit', 'EventTypes\EditController@update')->name('post_edit_event_types');
Route::post('/home/event_types/delete', 'EventTypes\ListController@delete')->name('delete_edit_event_list');

//Events
Route::get('/home/events', 'Events\ListController@index')->name('events_list');
Route::get('/home/events/create', 'Events\CreateController@get')->name('create_event');
Route::get('/home/events/{id}/edit', 'Events\EditController@get')->name('edit_event');
Route::post('/home/events', 'Events\CreateController@create')->name('post_create_event');
Route::put('/home/events/edit', 'Events\EditController@update')->name('post_edit_event');
Route::post('/home/events/delete', 'Events\ListController@delete')->name('delete_event');

//Events
Route::get('/home/guests/{eventId?}', 'Guests\ListController@index')->name('guests_list');
Route::get('/home/guests/create/{eventId?}', 'Guests\CreateController@get')->name('create_guest');
Route::get('/home/guests/{id}/edit', 'Guests\EditController@get')->name('edit_guest');
Route::post('/home/guests', 'Guests\CreateController@create')->name('post_create_guest');
Route::put('/home/guests/edit', 'Guests\EditController@update')->name('post_edit_guest');
Route::post('/home/guests/delete', 'Guests\ListController@delete')->name('delete_guest');