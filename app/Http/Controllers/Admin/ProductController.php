<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Validator;
use ImageUpload;

class ProductController extends Controller {

    public function listProduct(Request $request) {
        $response = [
            'title' => 'Sản phẩm'
        ];
        $product_query = Product::select([
                    'products.product_id',
                    'products.product_sku',
                    'products.product_name',
                    'products.product_featured',
                    'products.product_price',
                    'products.product_suggest',
                    'products.product_meta_title',
                    'products.product_status',
                    'products.product_created_by',
                    'products.product_created_at',
                    'products.product_updated_by',
                    'products.product_updated_at',
                    'categories.category_id',
                    'categories.category_name',
                ])
                ->join('categories', 'categories.category_id', '=', 'products.category_id')
                ->orderBy('products.product_created_at', 'DESC');
        if ($request->has('sku') && $request->input('sku') != "") {
            $product_query->where('products.product_sku', $request->input('sku'));
        }
        if ($request->has('name') && $request->input('name') != "") {
            $product_query->where('products.product_name', 'LIKE', '%' . $request->input('name') . '%');
        }
        if ($request->has('category') && is_numeric($request->input('category'))) {
            $product_query->where('products.category_id', $request->input('category'));
        }
        if ($request->has('status') && is_numeric($request->input('status'))) {
            $product_query->where('products.product_status', $request->input('status'));
        }
        if ($request->has('suggest') && is_numeric($request->input('suggest'))) {
            $product_query->where('products.product_suggest', $request->input('suggest'));
        }
        $response['categories'] = Category::where('category_type', 1)
                        ->orderBy('category_name', 'ASC')->get();
        $response['products'] = $product_query->paginate(env('PAGINATE_ITEM', 20));
        return view('admin.product.listProduct', $response);
    }

    public function addProduct() {
        $response = [
            'title' => "Thêm sản phẩm mới"
        ];
        $response['categories'] = Category::where('category_type', 1)->get();
        return view('admin.product.addProduct', $response);
    }

    public function doAddProduct(ProductRequest $request) {
        try {
            $sku = trim($request->input('txt-sku'));
            $product = Product::select(['product_id'])
                    ->where('product_sku', $sku)
                    ->first();
            if (empty($product)) {
                $product = new Product;
                $product->category_id = $request->input('sl-category');
                $product->product_sku = $sku;
                $product->product_name = trim($request->input('txt-name'));
                $product->product_price = $request->input('txt-price');
                $product->product_suggest = $request->input('product_suggest');
                $product->product_sale_percent = $request->input('txt-sale-percent');
                $product->product_slug = str_slug($request->input('txt-name'));
                $product->product_description = trim($request->input('txt-description'));
                $product->product_meta_title = $product->product_name;
                if ($request->input('txt-meta-title') != "") {
                    $product->product_meta_title = trim($request->input('txt-meta-title'));
                }
                $product->product_meta_desc = trim($request->input('txt-meta-desc'));
                if ($request->has('txt-featured-type')) {
                    if ($request->hasFile('file-featured') && $request->input('txt-featured-type') == 'file') {
                        $product->product_featured = ImageUpload::image($request->file('file-featured'), md5('product_' . $product->product_name . time()));
                    } elseif ($request->input('txt-featured') != "" && $request->input('txt-featured-type') == 'url') {
                        $product->product_featured = ImageUpload::image($request->input('txt-featured'), md5('product_' . $product->product_name . time()));
                    }
                }
                if ($request->has('txt-images')) {
                    $product->product_images = json_encode(array_slice($request->input('txt-images'), 0, 6));
                } else {
                    $product->product_images = json_encode([]);
                }
                $product->product_status = $request->input('rd-status');
                $product->product_created_at = microtime(true);
                $product->product_created_by = $request->session()->get('user')->user_id;
                try {
                    $product->save();
                    return redirect()->action('Admin\ProductController@listProduct')->with('success', 'Thêm sản phẩm "' . $product->product_name . '" thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
                }
            } else {
                return redirect()->back()->with('error', "Mã sản phẩm đã tồn tại");
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
        }
    }

    public function editProduct(Request $request, $product_id) {
        try {
            $product = Product::where('product_id', $product_id)->first();
            if (!empty($product)) {
                $response = [
                    'title' => "Sửa sản phẩm: " . $product->product_name
                ];
                $product->product_images = json_decode($product->product_images);
                $response['product'] = $product;
                $response['categories'] = Category::where('category_type', 1)->get();
                return view('admin.product.editProduct', $response);
            } else {
                return redirect()->action('Admin\productController@listproduct')->with('error', 'Sản phẩm không tồn tại');
            }
        } catch (\Exception $ex) {
            return redirect()->action('Admin\productController@listproduct')->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function doEditProduct(ProductRequest $request, $product_id) {
        try {
            $product = Product::where('product_id', $product_id)->first();
            if (!empty($product)) {
                $sku = trim($request->input('txt-sku'));
                $product_exist = Product::select(['product_id'])
                        ->where('product_sku', $sku)
                        ->where('product_id', '<>', $product->product_id)
                        ->first();
                if (empty($product_exist)) {
                    $product->category_id = $request->input('sl-category');
                    $product->product_sku = $sku;
                    $product->product_name = trim($request->input('txt-name'));
                    $product->product_price = $request->input('txt-price');
                    $product->product_suggest = $request->input('product_suggest');
                    $product->product_sale_percent = $request->input('txt-sale-percent');
                    $product->product_slug = str_slug($request->input('txt-name'));
                    $product->product_description = trim($request->input('txt-description'));
                    if ($request->input('txt-meta-title') != "") {
                        $product->product_meta_title = trim($request->input('txt-meta-title'));
                    } else {
                        $product->product_meta_title = $product->product_name;
                    }
                    $product->product_meta_desc = trim($request->input('txt-meta-desc'));
                    if ($request->has('txt-featured-type')) {
                        if ($request->hasFile('file-featured') && $request->input('txt-featured-type') == 'file') {
                            $product->product_featured = ImageUpload::image($request->file('file-featured'), md5('product_' . $product->product_name . time()));
                        } elseif ($request->input('txt-featured') != "" && $request->input('txt-featured-type') == 'url') {
                            $product->product_featured = ImageUpload::image($request->input('txt-featured'), md5('product_' . $product->product_name . time()));
                        }
                    }
                    if ($request->has('txt-images')) {
                        $product->product_images = json_encode(array_slice($request->input('txt-images'), 0, 6));
                    } else {
                        $product->product_images = json_encode([]);
                    }
                    $product->product_status = $request->input('rd-status');
                    $product->product_updated_at = microtime(true);
                    $product->product_updated_by = $request->session()->get('user')->user_id;
                    try {
                        $product->save();
                        return redirect()->back()->with('success', 'Sửa sản phẩm "' . $product->product_name . '" thành công');
                    } catch (\Exception $exc) {
                        return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
                    }
                } else {
                    return redirect()->back()->with('error', 'Mã sản phẩm đã tồn tại');
                }
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function doDeleteProduct(DeleteRequest $request) {
        try {
            $product = Product::select(['product_name', 'product_id'])->where('product_id', $request->input('txt-id'))->first();

            if (!empty($product)) {
                try {
                    $product->delete();
                    return redirect()->back()->with('success', 'Xóa sản phẩm "' . $product->product_name . '" thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
                }
            } else {
                return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

    public function listCategory() {
        $response = [
            'title' => "Chuyên mục sản phẩm"
        ];
        $category_query = Category::where('category_type', 1)
                ->orderBy('category_name', 'ASC');
        $response['categories'] = $category_query->paginate(env('PAGINATE_ITEM', 20));
        return view('admin.product.listCategory', $response);
    }

    public function doAddCategory(ProductCategoryRequest $request) {
        try {
            $slug = str_slug($request->input('txt-name'));
            $category = Category::select(['category_id'])
                    ->where([
                        'category_slug' => $slug,
                        'category_type' => 1
                    ])
                    ->first();
            if (empty($category)) {
                $category = new Category;
                $category->category_name = trim($request->input('txt-name'));
                $category->category_slug = $slug;
                $category->category_meta_title = $category->category_name;
                if ($request->input('txt-meta-title') != "") {
                    $category->category_meta_title = $request->input('txt-meta-title');
                }
                $category->category_type = 1;
                $category->category_status = 1;
                $category->category_meta_desc = $request->input('txt-meta-desc');
                $category->category_created_at = microtime(true);
                $category->category_created_by = $request->session()->get('user')->user_id;
                try {
                    $category->save();
                    return redirect()->back()->with('success', 'Thêm chuyên mục "' . $category->category_name . '" thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
                }
            } else {
                return redirect()->back()->with('error', "Chuyên mục sản phẩm đã tồn tại");
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
        }
    }

    public function loadCategory(Request $request) {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                        'category_id' => "required|alpha_num",
                            ], [
                        'category_id.required' => "Chuyên mục sản phẩm không hợp lệ",
                        'category_id.alpha_num' => "Chuyên mục sản phẩm không hợp lệ",
            ]);
            if (!$validator->fails()) {
                try {
                    $category = Category::select([
                                        'category_id',
                                        'category_name',
                                        'category_slug',
                                        'category_meta_desc',
                                        'category_meta_title'
                                    ])
                                    ->where([
                                        'category_id' => $request->input('category_id'),
                                        'category_type' => 1
                                    ])->first();
                    if (!empty($category)) {
                        return response()->json([
                                    "status_code" => 200,
                                    "data" => $category
                        ]);
                    } else {
                        return response()->json([
                                    "status_code" => 404,
                                    "message" => "Chuyên mục sản phẩm không tồn tại",
                        ]);
                    }
                } catch (\Exception $ex) {
                    return response()->json([
                                "status_code" => 500,
                                "message" => "Lỗi trong quá trình xử lý dữ liệu",
                    ]);
                }
            } else {
                return response()->json([
                            "status_code" => 422,
                            "message" => $validator->errors()->first(),
                ]);
            }
        }
        return redirect()->action('Admin\HomeController@index')->with('error', 'Không được truy cập trực tiếp');
    }

    public function doEditCategory(ProductCategoryRequest $request) {
        try {
            $category = Category::where([
                        'category_id' => $request->input('txt-id'),
                        'category_type' => 1
                    ])->first();
            if (!empty($category)) {
                $category->category_name = trim($request->input('txt-name'));
                $category->category_slug = str_slug($request->input('txt-name'));
                $category->category_meta_title = $category->category_name;
                if ($request->input('txt-meta-title') != "") {
                    $category->category_meta_title = $request->input('txt-meta-title');
                }
                $category->category_meta_desc = $request->input('txt-meta-desc');
                $category->category_updated_at = microtime(true);
                $category->category_updated_by = $request->session()->get('user')->user_id;
                try {
                    $category->save();
                    return redirect()->back()->with('success', 'Sửa chuyên mục sản phẩm "' . $category->category_name . '" thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
                }
            } else {
                return redirect()->back()->with('error', "Chuyên mục không tồn tại");
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', "Lỗi trong quá trình xử lý dữ liệu");
        }
    }

    public function doDeleteCategory(DeleteRequest $request) {
        try {
            $category = Category::select(['category_name', 'category_id', 'category_slug', 'category_meta_desc'])
                            ->where('category_id', $request->input('txt-id'))->first();
            if (!empty($category)) {
                try {
                    $category->delete();
                    return redirect()->back()->with('success', 'Xóa chuyên mục sản phẩm "' . $category->category_name . '" thành công');
                } catch (\Exception $exc) {
                    return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
                }
            } else {
                return redirect()->back()->with('error', 'Chuyên mục sản phẩm không tồn tại');
            }
        } catch (\Exception $exc) {
            return redirect()->back()->with('error', 'Lỗi trong quá trình xử lý dữ liệu');
        }
    }

}
