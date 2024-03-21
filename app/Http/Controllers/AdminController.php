<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use PDF;
use Notification;
use App\Notification\SendEmailNotification;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;



class AdminController extends Controller
{
    public function view_catagory()
    {
        $data=catagory::all();

        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data = new catagory;
       $data->catagory_name=$request->catagory;

       $data->save();

    //    Alert::success('Category Added Successfully', 'Category Added Successfully');

       return redirect()->back()->with('message', 'Category Added Successfully');

    }

    public function delete_catagory($id)
    {
        $data=catagory::find($id);
        $data->delete();

        Alert::success('Category Deleted Successfully' , 'Category Deleted Successfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $catagory=catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|numeric|min:0',
        'catagory' => 'required',
        'weight' => 'required',
        'ingradients' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = new Product;
    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->discount_price = $request->dis_price;
    $product->catagory = $request->catagory;
    $product->weight = $request->weight;
    $product->ingradients = $request->ingradients;

    $image = $request->file('image');
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $image->move('product', $imagename);
    $product->image = $imagename;

    $product->save();
    

    return redirect()->back()->with('message', 'Product Added Successfully');
}


    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product =product::find($id);

        $product->delete();

        Alert::success('Product Deleted Successfully', 'Product Deleted Successfully');

        return redirect()->back();
    }

    public function update_product($id)
    {
        $product=product::find($id);
        $catagory=catagory::all();
        return view('admin.update_product',compact('product','catagory'));
    }

    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);

        $product->title=$request->title;

        $product->description=$request->description;

        $product->price=$request->price;

        $product->quantity=$request->quantity;

        $product->discount_price=$request->dis_price;

        $product->catagory=$request->catagory;


        $image= $request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename; 
        }
        
        $product->save();
        return redirect()->back()->with('message','Product Updated Successfully');

    }

    public function order()
    {
        $order=order::all();

        return view('admin.order', compact('order'));
    }

    public function delivered($id)
    {

        $order=order::find($id);

        $order->delivery_status="delivered";

        $order->payment_status='paid';

        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order = order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order = order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,   

        ];

        Notification::send($order, new SendEmailNotification($details));
        return redirect()->back;
    }

    public function searchOrderdata(Request $request)

    {
        $searchOrderText = $request->searchOrder;
        $order = order::where('name','LIKE', "%$searchOrderText%")
        ->orWhere('email','LIKE', "%$searchOrderText%")
        ->orWhere('product_title','LIKE', "%$searchOrderText%")
        ->orWhere('address','LIKE', "%$searchOrderText%")
        ->orWhere('phone','=', $searchOrderText)
        ->orWhere('price','=', $searchOrderText)->get();

        return view('admin.order', compact('order'));
    }

    public function customer_details()
    {
       $users=user::all();
        return view('admin.customer_details',compact('users'));
    }

    public function sale_details() 
    {
        $order = order::all();
        return view('admin.sale_details', compact('order'));
    }

    public function inventory_details() 
    {
        $product = product::all();
        return view('admin.inventory_details', compact('product'));
    }

     public function searchProductdata (Request $request)

     {
         $searchTextProduct = $request->searchproduct;
         $product = product::where('title','LIKE', "%$searchTextProduct%")
         ->orWhere('description','LIKE', "%$searchTextProduct%")
         ->orWhere('price','=', $searchTextProduct)
         ->orWhere('discount_price','=', $searchTextProduct)
         ->orWhere('ingradients','LIKE', "%$searchTextProduct%")->get();
 
         return view('admin.show_product', compact('product'));
     }

     public function searchCustomerdata (Request $request)

     {
         $searchTextClient = $request->searchCustomer;
         $user = user::where('name','LIKE', "%$searchTextClient%")->get();
         //in here client details are not coming from admin folder(reason to the error)
         return view('admin.customer_details', compact('user'));
     }


     public function searchSalesdata (Request $request)
     {
         $searchTextSales = $request->searchSales;
         $order = order::where('product_title','LIKE', "%$searchTextSales%")
         ->orWhere('email','LIKE', "%$searchTextSales%")
        ->orWhere('product_title','LIKE', "%$searchTextSales%")
        ->orWhere('address','LIKE', "%$searchTextSales%")
        ->orWhere('phone','=', $searchTextSales)
        ->orWhere('name','=', $searchTextSales)->get();
 
         return view('admin.sale_details', compact('order'));
     }


     public function searchInventorydata (Request $request)
     {
         $searchTextInventory = $request->searchInventory;
         $product = product::where('title','LIKE', "%$searchTextInventory%")
         ->orWhere('weight','=', $searchTextInventory) 
         ->orWhere('catagory','LIKE', "%$searchTextInventory%")->get();
         
         return view('admin.inventory_details', compact('product'));
     }
     

     public function print_product_report ($id)
     {
        $product=product::all();
        $pdf=PDF::loadView('admin.product_pdf',compact('product'));
        return $pdf->download('product_report.pdf');

     }

     public function print_order_report($id)
     {
        $order=order::all();
        $pdf=PDF::loadView('admin.order_pdf',compact('order'));
        return $pdf->download('order_report.pdf');
     }


    public function print_sales_report($id)
    {
        $order=order::all();
        $pdf=PDF::loadView('admin.sales_pdf',compact('order'));
        return $pdf->download('sales_report.pdf');

    }

    public function print_inventory_report($id)
    {
        $product=product::all();
        $pdf=PDF::loadView('admin.inventory_pdf',compact('product'));
        return $pdf->download('inventory_report.pdf');
    }

    public function delete_inventory($id)
    {
        $data=product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Inventory Deleted Successfully');
    }

    // public function update_inventory ()
    // {
    //     $product=product::find($id);
    //     $catagory=catagory::all();
    //     return view('admin.update_inventory',compact('product','product'));

    // }


public function latestOrders()
{
    // Retrieve the latest 5 orders from the orders table
    $orders = Order::latest()->take(5)->get();

    // Pass the orders data to the view
    return view('admin.body', compact('orders'));
}



    

}
