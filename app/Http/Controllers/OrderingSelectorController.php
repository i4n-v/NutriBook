<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderingSelectorController extends Controller
{
    public function ordering(Request $request) {
        $data = [
            'column' => '',
            'value' => '',
        ];

        // request from eating plans table       
        if ($request->order == 'titleAsc') {
            $data['column'] = 'title';
            $data['value'] = 'asc';
        } elseif ($request->order == 'titleDesc') {
            $data['column'] = 'title';
            $data['value'] = 'desc';
        } elseif ($request->order == 'dateStartAsc') {
            $data['column'] = 'date_start';
            $data['value'] = 'asc';
        } elseif ($request->order == 'dateStartDesc') {
            $data['column'] = 'date_start';
            $data['value'] = 'desc';
        } elseif ($request->order == 'dateFinishAsc') {
            $data['column'] = 'date_finish';
            $data['value'] = 'asc';
        } elseif ($request->order == 'dateFinishDesc') {
            $data['column'] = 'date_finish';
            $data['value'] = 'desc';

        //request from patients table
        } elseif ($request->order == 'nameAsc') {
            $data['column'] = 'name';
            $data['value'] = 'asc';
        } elseif ($request->order == 'nameDesc') {
            $data['column'] = 'name';
            $data['value'] = 'desc';
        } elseif ($request->order == 'cpfAsc') {
            $data['column'] = 'CPF';
            $data['value'] = 'asc';
        } elseif ($request->order == 'cpfDesc') {
            $data['column'] = 'CPF';
            $data['value'] = 'desc';
        }
        
        return view('home', $data);
    }

}
