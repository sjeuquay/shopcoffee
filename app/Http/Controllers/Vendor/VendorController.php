<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\VendorRequest;
use App\Models\Setting\Currency;
use App\Models\Setting\Status;
use App\Models\Vendor\Type;
use App\Models\Vendor\Vendor;
use App\Utils\EloquentHelper;
use App\Utils\Message;
use App\Utils\UnixConverter;
use Illuminate\Http\RedirectResponse;

class VendorController extends Controller
{
    /**
     * Quickly retrieve necessary lists
     *
     * @return array
     */
    public static function requireDumper(): array
    {
        $type_list     = Type::select(Type::ID, Type::DESCRIPTION)->get();
        $status_list   = Status::select(Status::STATUS_CODE, Status::DESCRIPTION)->get();
        $currency_list = Currency::select(Currency::ID, Currency::SHORT_NAME)->get();

        return compact(
            'type_list',
            'status_list',
            'currency_list'
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Vendor::with([ 'currency', 'status', 'type' ])->get();

        return view('admin.vendor.index', [
             ...compact('list'),
            ...$this->requireDumper(),
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Not yet implement create for vendor";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request): RedirectResponse
    {

        $img = $request->file(Vendor::LOGO);
        if ($img) {
            $name = uniqid() . '.' . $img->getClientOriginalExtension();
            $dir  = public_path('img/vendor_logo');
            $img->move($dir, $name);
        }
        ${Vendor::LOGO}         = isset($name) ? "img/vendor_logo/$name" : vendor::DEFAULT_IMG;
        ${Vendor::DATE_JOINED}  = now();
        ${Vendor::UPDATED_TIME} = now();

        EloquentHelper::create(Vendor::class, [
             ...$request->all(),
            ...compact('logo', 'date_joined'),
         ]);

        return redirect()->route('admin.vendor.index', Message::SUCCESS());
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        // not yet inplement owner and modified user relations
        $vendor->load('type', 'status', 'currency');

        return view('admin.vendor.show', [
            'v' => $vendor,
            ...$this->requireDumper(),
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorRequest $request, Vendor $vendor): RedirectResponse
    {
        // chưa thiết lập cập nhật update cho user_id và modified_by_user_id

        $addons                 = [ vendor::UPDATED_TIME ];
        ${vendor::UPDATED_TIME} = now(UnixConverter::VN_TIMEZONE);

        $img = $request->file(Vendor::LOGO);
        // check if there is img uploaded and add to update array
        if ($img) {
            $old_img_path = public_path($vendor[ vendor::LOGO ]);
            if (file_exists($old_img_path)) {
                unlink($old_img_path);
            }
            $name = uniqid() . '.' . $img->getClientOriginalExtension();
            $dir  = public_path(vendor::DIR_LOGO);
            $img->move($dir, $name);

            ${Vendor::LOGO} = vendor::DIR_LOGO . "/$name";
            $addons[  ]     = vendor::LOGO;
        }

        $vendor->update([
             ...$request->all(),
            ...compact(...$addons),
         ]);

        return redirect()->back()->with(Message::INFO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor): RedirectResponse
    {
        if (vendor::DEFAULT_IMG != $vendor[ vendor::LOGO ]) {
            $img_path = public_path($vendor->logo);
            if (file_exists($img_path)) {
                unlink($img_path);
            }
        }
        $vendor->delete();

        return redirect()->route('admin.vendor.index', Message::DANGER());
    }
}
