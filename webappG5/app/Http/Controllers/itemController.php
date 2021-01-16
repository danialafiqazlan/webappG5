<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class itemController extends Controller

// display listing of items
{
    public function master()
    {
        $items = Item::with('brand')->get();
        return view('items.master', ['items'=>$items]);
    }
}

// store new items

public function create()
{
    $items = Category::all();
    return view('items.create', ['categories'=>$categories]);
}

public function store(Request $categories)
{
    $validatedData = $this->validate($categories, [
        'item_ID'  =>  'required',
        'item_name'  =>  'required',
        'brand'    =>  'required',
        'inventory_level' =>  'required',
        'image' => '',
        'quantity'  =>  'required',
        'remarks'   =>  '',
    ]);

    if(isset($validatedData['Category']))
    {
        $insertingRow = new Item();
        $insertingRow->item_ID = $validatedData['item_ID'];
        $insertingRow->item_name = $validatedData['item_name'];
        $insertingRow->brand = $validatedData['brand'];
        $insertingRow->inventory_level = $validatedData['inventory_level'];
        $image = $categories->file('image');
        $insertingRow->quantity = $validatedData['quantity'];
        $insertingRow->remarks = $validatedData['remarks'];
        $insertingRow->save();
        $insertingRow->categories()->sync($validatedData['category']);
        return redirect()->route('items.master')->with('success-message', 'Item Added Successfully');
    }
    return redirect()->route('category.create')->with('error-message', 'Enter Category First');
}

    // display specified items

    public function show($item_ID)
    {
        return redirect()->route('items.master');
    }

    // update specified items

    public function update(Request $validatedData, $item_ID)
    {
        $updatingRow = Item::find($item_ID);
        $this->validate($categories, [
            'item_ID'  =>  'required',
            'item_name'  =>  'required',
            'brand'    =>  'required',
            'inventory_level' =>  'required',
            'image' => '',
            'quantity'  =>  'required',
            'remarks'   =>  '',
        ]);

        if($validatedData->category){
            $updatingRow->item_ID = $categories->item_ID;
            $updatingRow->item_name = $categories->item_name;
            $updatingRow->brand = $categories->brand;
            $updatingRow->inventory_level = $categories->inventory_level;
            $updatingRow->quantity = $categories->quantity;
            $updatingRow->remarks = $categories->remarks;
            }
            $updatingRow->update();
            $updatingRow->categories()->sync($request->category);
            return redirect()->route('items.master')->with('success-message', 'Item Updated Successfully');
        }
        return redirect()->route('category.create')->with('error-message', 'Enter Category First');
    }

    
    // Delete specified items


    public function destroy($item_ID)
    {
        $delRow = Item::find($item_ID);
        $delRow->delete();
        return redirect()->route('items.master')->with('success-message', 'Item Deleted Successfully');
    }
}