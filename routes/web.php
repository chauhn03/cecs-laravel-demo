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

Route::get('/home', 'Members\ListMembersController@index')->name('members_list');

Route::get('/home/member/create', 'Members\CreateMemberControllers@getCreateMember')->name('create_member');
Route::post('/home/members', 'Members\CreateMemberControllers@create')->name('post_create_member');
Route::post('/home/members/createandnew', 'Members\CreateMemberControllers@createAndNew')->name('post_create_and_new_member');
