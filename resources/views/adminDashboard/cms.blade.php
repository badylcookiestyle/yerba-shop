@extends('layouts.app')
@extends('cms.cms')
@section('content')
    <section class="main-dashboard my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list">
                        <a href="/admin" class="list-group-item  text-dark">
                            Dashboard
                        </a>
                        <a href="/admin/productList" class="list-group-item text-dark">Products</a>
                        <a href="/admin/orders" class="list-group-item text-dark">Orders</a>
                        <a href="/admin/userList" class="list-group-item text-dark">Users</a>
                        <a href="/admin/cms" class="list-group-item text-white bg-dark">Cms</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <header class="col-12 border text-center">
                        <button class="btn btn-link  text-white bg-dark h-btn " id="btn-main">Main</button>
                        <button class="btn btn-link text-dark h-btn" id="btn-shop">Shop Header</button>
                        <button class="btn btn-link text-dark h-btn" id="btn-about">About</button>
                       <!-- <button class="btn btn-link text-dark h-btn" id="btn-contact">Contact</button>-->
                    </header>
                    <div class="col-12 current">
                        <div class="s" id="s-btn-main">
                            <form>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="yerba-shop">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="7"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="backgroundImage">Image</label>
                                    <input type="file" class="form-control-file" id="backgroundImage">
                                </div>
                            </form>
                            <button class="btn btn-info" id="main-change">change</button>
                        </div>
                        <div class="s" id="s-btn-shop">
                            <form>

                                <div class="form-group">
                                    <label for="title-shop">Title</label>
                                    <input type="text" class="form-control" id="title-shop" placeholder="yerba-shop">
                                </div>

                                <div class="form-group">
                                    <label for="backgroundImage-shop">Example file input</label>
                                    <input type="file" class="form-control-file" id="backgroundImage-shop">
                                </div>
                            </form>
                            <button class="btn btn-info" id="shop-change">change</button>
                        </div>
                        <div class="s" id="s-btn-about">
                            <form>

                                <div class="form-group">
                                    <label for="title-about">Title</label>
                                    <input type="text" class="form-control" id="title-about" placeholder="yerba-shop">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description-about" rows="7"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="backgroundImage-about">Image</label>
                                    <input type="file" class="form-control-file" id="backgroundImage-about">
                                </div>
                            </form>
                            <button class="btn btn-info" id="about-change">change</button>
                        </div>
                        <div class="s" id="s-btn-contact">c</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">

    </footer>
    @push('scripts')

<script src="{{asset('js/cmsPageSwitcher.js')}}">

</script>
<script src="{{asset('js/cms/addAbout.js')}}">
</script>
<script src="{{asset('js/cms/addHeader.js')}}">
</script>
<script src="{{asset('js/cms/addMain.js')}}">
</script>
    @endpush

@endsection
