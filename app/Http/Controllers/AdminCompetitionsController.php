<?php

namespace App\Http\Controllers;

use App\Competition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCompetitionsController extends Controller
{
    public function index()
    {
        $competitions = Competition::all();
        return view('admin.competitions.index', [
            'competitions' => $competitions
        ]);
    }

    public function show(Competition $competition)
    {
        return  view('admin.competitions.show', compact('competition'));
    }

    public function create()
    {
        return view('admin.competitions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            /* 'type' => ['required', 'string', Rule::in(['free', 'discount'])], */
            'discount_percentage' => [/* Rule::requiredIf(request('type') == 'discount') */ 'required', 'integer', 'min:1', 'max:100'],
            /* 'week' => ['required', 'date'], */
            'available_tickets' => ['required', 'numeric'],
            'trip_at' => ['required', 'date'],
            'direction' => ['required'],
            'finish_at' => ['required', 'date', 'before_or_equal:' . request('trip_at')],
            'starting_place' => ['required', 'string'],
            'finishing_place' => ['required', 'string'],
            'sponsor' => ['string', 'required'],
            'transportation_company' => ['string'],
            'booking_link' => ['required', 'url'],
            'result_phone' => ['required'],
            //'banner' => ['image'],
        ]);

        if (request()->has('banner')) {
            if (request()->hasFile('banner')) {
                $file = request()->file('banner')->store('banners');
                $attributes['banner'] = 'storage/' . $file;
            }
            else {
                $attributes['banner'] = request('banner');
            }
        }

        $attributes['day'] = Carbon::createFromFormat('Y-m-d', request('trip_at'))->dayOfWeek;

        /* $BASE_YEAR = 2020;

        $week = Carbon::createFromFormat('Y-m-d', request('week'));
        $attributes['week'] = ($week->year - $BASE_YEAR + 1) * $week->weekOfYear; */

        // Another way: Make date intervals and check for overlap. if overlapped, then the user has registered already.

        Competition::create($attributes);

        return redirect()->route('admin.competitions.index')->with('message', 'تم إضافة القرعة بنجاح')->with('type', 'success');
    }

    public function edit(Competition $competition)
    {
        return view('admin.competitions.edit', compact('competition'));
    }

    public function update(Competition $competition)
    {
        $attributes = request()->validate([
            /* 'type' => ['required', 'string', Rule::in(['free', 'discount'])], */
            'discount_percentage' => [/* Rule::requiredIf(request('type') == 'discount') */ 'required', 'integer', 'min:1', 'max:100'],
            /* 'week' => ['required', 'date'], */
            'available_tickets' => ['required', 'numeric'],
            'trip_at' => ['required', 'date'],
            'direction' => ['required'],
            'finish_at' => ['required', 'date', 'before_or_equal:' . request('trip_at')],
            'starting_place' => ['required', 'string'],
            'finishing_place' => ['required', 'string'],
            'sponsor' => ['string', 'required'],
            'transportation_company' => ['string'],
            'booking_link' => ['required', 'url'],
            'result_phone' => ['required']
            //'banner' => ['image']
        ]);

        if (request()->has('banner')) {
            if (request()->hasFile('banner')) {
                $file = request()->file('banner')->store('banners');
                $attributes['banner'] = 'storage/' . $file;
            }
            else {
                $attributes['banner'] = request('banner');
            }
        }

        $attributes['day'] = Carbon::createFromFormat('Y-m-d', request('trip_at'))->dayOfWeek;

        $competition->update($attributes);

        return redirect()->route('admin.competitions.index')->with('message', 'تم تعديل القرعة بنجاح')->with('type', 'success');
    }

    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('admin.competitions.index')->with('message', 'تم حذف القرعة بنجاح')->with('type', 'success');
    }
}
