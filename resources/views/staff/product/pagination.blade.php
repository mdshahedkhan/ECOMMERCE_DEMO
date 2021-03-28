<div class="dataTableData">
    <form id="SubmitForm">
        <table class="table table-responsive-sm table-responsive-md table-responsive-xl table-responsive-lg">
            <thead>
                <tr>
                    <th width="10px">
                        <input type="checkbox" id="allChecked" class="allCheck">
                    </th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Buy Price</th>
                    <th>Sl Price</th>
                    <th>Sp Price</th>
                    <th>Feature Product</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th><i class="bx bx-list-check" style="font-size: 25px"></i></th>
                </tr>
            </thead>
            <tbody class="table-light font-13">
                @foreach($products as $product)
                    <tr class="RemoveRow{{ $product->id }}">
                        <td>
                            <input type="checkbox" class="checkboxChecked-Items" name="checkItems[]" value="{{ $product->id }}">
                        </td>
                        <td width="">
                            <a href="{{ asset('uploads/product/'.$product->thumbnail) }}" target="_blank" data-lightbox="{{ $product->thumbnail }}" data-title="{{ $product->name }}">
                                <img src="{{ asset('uploads/product/'.$product->thumbnail) }}" width="50px" class="rounded ml-3 shadow" alt="Product">
                            </a>
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->model }}</td>
                        <td><input type="number" id="ChangeProductPrice" data-id="{{ $product->id }}" data-url="{{ route('staff.product.PriceUpdate') }}" class="form-control" value="{{ $product->buying_price }}"></td>
                        <td><input type="number" class="form-control" value="{{ $product->selling_price  }}"></td>
                        <td><input type="number" class="form-control" value="{!! $product->special_price !== null ? $product->special_price:'' !!}"></td>
                        <td><input type="checkbox" {{ $product->feature_pro == 1 ? 'checked':'' }}  id="featureProd" data-toggle="toggle" data-onstyle="info" data-offstyle="danger" class="btn-sm" data-size="small" data-id="{{ $product->id }}" data-url="{{ route('staff.product.featureProduct') }}"></td>
                        <td>
                            <span class="badge badge-{{ $product->status == 'active' ? 'success':'danger' }}">{{ $product->status == 'active' ? 'Active':'Inactive' }}</span>
                        </td>
                        {{--<input type="checkbox" data-toggle="toggle" data-on="Active" data-off="inactive" id="ProductStatus" data-id="{{ $product->id }}" data-size="small" data-onstyle="info"
                               data-offstyle="warning" {{ $product->status == 'active' ? 'checked':'' }} >--}}
                        <td style="font-size: 10px">{{ $product->users->name }}</td>
                        <td>
                            <div class="d-flex button-group">
                                {{--<i class="bx bx-dots-horizontal " style="font-size: 20px"></i>--}}
                                <a href="{{ route('staff.product.edit', base64_encode($product->id)) }}" class="btn btn-info mr-1 btn-sm"><i class="bx bx-edit" style="font-size: 15px"></i></a>
                                <a href="javascript:" onclick="DeleteItems('{{ route('staff.product.destroy', $product->id) }}', '{{ $product->id }}')" class="btn btn-danger btn-sm"><i class="bx bx-trash" style="font-size: 15px"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr class="ActionShowHide">
                    <td colspan="13">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-danger disabledButton dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu" style="">
                                <input type="button" class="dropdown-item" onclick="submitForm('{{ route('staff.product.MultiItemsActive') }}')" value="Active">
                                <input type="button" class="dropdown-item" onclick="submitForm('{{ route('staff.product.MultiItemsInactive') }}')" value="Inactive">
                                <input type="button" class="dropdown-item" onclick="submitForm('{{ route('staff.product.MultiItemsDelete') }}')" value="Delete">
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        {{ $products->links() }}
    </form>
</div>

