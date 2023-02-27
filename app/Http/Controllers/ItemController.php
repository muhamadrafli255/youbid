<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\GradeItem;
use App\Models\ItemImage;
use App\Models\ItemModel;
use App\Models\DetailItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $title = "Daftar Barang";
        return view('contents.items.index', compact('title'));
    }

    public function detail($id)
    {
        $title = "Detail Barang";
        $items = Item::where('id', $id)->get();
        $images[] = ItemImage::where('item_id', $id)->get();
        $i = 0;
        return view('contents.items.detail', compact('title', 'items', 'images', 'i'));
    }

    public function create()
    {
        $title  =   "Tambah Barang";
        $models = ItemModel::get();
        $i = 0;
        return view('contents.items.create', compact('title', 'models', 'i'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'                      =>  'required',
            'item_model_id'             =>  'required',
            'description'               =>  'required',
            'police_number'             =>  'required',
            'machine_capacity'          =>  'required',
            'transmission'              =>  'required',
            'chassis_number'            =>  'required',
            'machine_number'            =>  'required',
            'kilometers'                =>  'required',
            'fuel'                      =>  'required',
            'physical_color'            =>  'required',
            'vehicle_registration'      =>  'required',
            'vehicle_registration_date' =>  'required',
            'book_vehicle_owner'        =>  'required',
            'invoice'                   =>  'required',
            'receipt'                   =>  'required',
            'owner_identity'            =>  'required',
            'image_name'                =>  'required',
            'interior'                  =>  '',
            'exterior'                  =>  '',
            'machine'                   =>  '',
            'chassis'                   =>  '',
        ]);

        $detailItem = DetailItem::create([
            'police_number'             =>  $validatedData['police_number'],
            'machine_capacity'          =>  $validatedData['machine_capacity'],
            'transmission'              =>  $validatedData['transmission'],
            'chassis_number'            =>  $validatedData['chassis_number'],
            'machine_number'            =>  $validatedData['machine_number'],
            'kilometers'                =>  $validatedData['kilometers'],
            'fuel'                      =>  $validatedData['fuel'],
            'physical_color'            =>  $validatedData['physical_color'],
            'vehicle_registration'      =>  $validatedData['vehicle_registration'],
            'vehicle_registration_date' =>  $validatedData['vehicle_registration_date'],
            'book_vehicle_owner'        =>  $validatedData['book_vehicle_owner'],
            'invoice'                   =>  $validatedData['invoice'],
            'receipt'                   =>  $validatedData['receipt'],
            'owner_identity'            =>  $validatedData['owner_identity'],
        ]);

        if($request->interior != null){
            $gradeItem = GradeItem::create([
                'interior'  =>  $validatedData['interior'],
                'exterior'  =>  $validatedData['exterior'],
                'machine'   =>  $validatedData['machine'],
                'chassis'   =>  $validatedData['chassis']
            ]);
        }

        if($request->interior != null){
        $item = Item::create([
            'name'              =>  $validatedData['name'],
            'item_model_id'     =>  $validatedData['item_model_id'],
            'description'       =>  $validatedData['description'],
            'detail_item_id'    =>  $detailItem->id,
            'grade_item_id'     =>  $gradeItem->id,
            'created_by'        =>  Auth::user()->id,
        ]);
    }else{
        $item = Item::create([
            'name'              =>  $validatedData['name'],
            'item_model_id'     =>  $validatedData['item_model_id'],
            'description'       =>  $validatedData['description'],
            'detail_item_id'    =>  $detailItem->id,
            'created_by'        =>  Auth::user()->id,
        ]);
    }


        foreach($request->file('image_name') as $image){
            
            $imageName = time().rand(1,1000).'.'.$image->extension();
            $image->move(public_path('/img/item-images'),$imageName);
            $data = [];
            $data[] = [
                'item_id'       =>  $item->id,
                'image_name'    =>  $imageName,
                'created_at'    =>  Carbon::now(),
                'updated_at'    =>  Carbon::now()
            ];
            DB::table('item_images')->insert($data);
        }
        toast()->success('Berhasil!', 'Barang '.$request->name.' Berhasil Ditambahkan!');
        return redirect('/items');

    }

    public function edit($id)
    {
        $title = "Ubah Barang";
        $items = Item::where('id', $id)->get();
        $models = ItemModel::get();
        return view('contents.items.edit', compact('title', 'items', 'models'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'                      =>  'required',
            'item_model_id'             =>  'required',
            'description'               =>  'required',
            'police_number'             =>  'required',
            'machine_capacity'          =>  'required',
            'transmission'              =>  'required',
            'chassis_number'            =>  'required',
            'machine_number'            =>  'required',
            'kilometers'                =>  'required',
            'fuel'                      =>  'required',
            'physical_color'            =>  'required',
            'vehicle_registration'      =>  'required',
            'vehicle_registration_date' =>  'required',
            'book_vehicle_owner'        =>  'required',
            'invoice'                   =>  'required',
            'receipt'                   =>  'required',
            'owner_identity'            =>  'required',
            'image_name'                =>  'max:5120',
            'interior'                  =>  '',
            'exterior'                  =>  '',
            'machine'                   =>  '',
            'chassis'                   =>  '',
        ]);

        $items = Item::where('id', $id)->get();
        foreach($items as $item)

        $detailItem = DetailItem::where('id', $item->detail_item_id)->update([
            'police_number'             =>  $validatedData['police_number'],
            'machine_capacity'          =>  $validatedData['machine_capacity'],
            'transmission'              =>  $validatedData['transmission'],
            'chassis_number'            =>  $validatedData['chassis_number'],
            'machine_number'            =>  $validatedData['machine_number'],
            'kilometers'                =>  $validatedData['kilometers'],
            'fuel'                      =>  $validatedData['fuel'],
            'physical_color'            =>  $validatedData['physical_color'],
            'vehicle_registration'      =>  $validatedData['vehicle_registration'],
            'vehicle_registration_date' =>  $validatedData['vehicle_registration_date'],
            'book_vehicle_owner'        =>  $validatedData['book_vehicle_owner'],
            'invoice'                   =>  $validatedData['invoice'],
            'receipt'                   =>  $validatedData['receipt'],
            'owner_identity'            =>  $validatedData['owner_identity'],
        ]);

        if($request->interior != null){
            $gradeItem = GradeItem::where('id', $item->grade_item_id)->update([
                'interior'  =>  $validatedData['interior'],
                'exterior'  =>  $validatedData['exterior'],
                'machine'   =>  $validatedData['machine'],
                'chassis'   =>  $validatedData['chassis']
            ]);
        }

        $item = Item::where('id', $id)->update([
            'name'              =>  $validatedData['name'],
            'item_model_id'     =>  $validatedData['item_model_id'],
            'description'       =>  $validatedData['description'],
            'update_by'        =>  Auth::user()->id,
        ]);

        if($request->image_name != null){

            $itemimages = ItemImage::where('item_id', $id)->get();
            $img = $request->image_name;
            if($img[0] != null){
                $itemimages[0]->delete();
                unlink('img/item-images/'.$itemimages[0]->image_name);
            }
            else if($img[1] != null){
                $itemimages[1]->delete();
                unlink('img/item-images/'.$itemimages[1]->image_name);
            }
            else if($img[2] != null){
                $itemimages[2]->delete();
                unlink('img/item-images/'.$itemimages[2]->image_name);
            }
            else if($img[3] != null){
                $itemimages[3]->delete();
                unlink('img/item-images/'.$itemimages[3]->image_name);
            }
            // if($request->image_name == 1){
            //     $itemimages[0]->delete();
            //     dd($itemimages);
            // }

            foreach($request->file('image_name') as $image){
                
                $imageName = time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('/img/item-images'),$imageName);
                $data = [];
                $data[] = [
                    'item_id'       =>  $id,
                    'image_name'    =>  $imageName,
                    'created_at'    =>  Carbon::now(),
                    'updated_at'    =>  Carbon::now()
                ];
                DB::table('item_images')->insert($data);
            }
            toast()->success('Berhasil!', 'Barang '.$request->name.' Berhasil Dirubah!');
            return redirect('/items');
        }
        toast()->success('Berhasil!', 'Barang '.$request->name.' Berhasil Dirubah!');
        return redirect('/items');

    }

    public function delete($id)
    {
        $images = ItemImage::where('item_id', $id)->get();
        unlink('img/item-images/'.$images[0]->image_name);
        unlink('img/item-images/'.$images[1]->image_name);
        unlink('img/item-images/'.$images[2]->image_name);
        unlink('img/item-images/'.$images[3]->image_name);
        ItemImage::where('item_id', $id)->delete();
        $items = Item::where('id', $id)->get();
        foreach($items as $item)
        DetailItem::where('id', $item->detail_item_id)->delete();
        GradeItem::where('id', $item->grade_item_id)->delete();
        Item::where('id', $id)->delete();
        toast()->success('Berhasil!', 'Barang '.$item->name.' Berhasil Dihapus!');
        return redirect('/items');
    }
}
