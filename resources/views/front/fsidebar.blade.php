
<div id="sidebar" class="span3">
    <div class="well well-small">
        <ul class="nav nav-list">
            @foreach($kategori as $rs)
            <li><a href="{{url('/')}}/kategori/{{$rs->Id}}"><span class="icon-chevron-right"></span>{{$rs->adi}}</a></li>
            @endforeach
        </ul>
    </div>


    <ul class="nav nav-list promowrapper">
        <li>
            <div class="thumbnail">
                <a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                <img src="assets/img/bootstrap-ecommerce-templates.png" alt="bootstrap ecommerce templates">
                <div class="caption">
                    <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span class="pull-right">$22.00</span></h4>
                </div>
            </div>
        </li>
        <li style="border:0"> &nbsp;</li>
        <li>
            <div class="thumbnail">
                <a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                <img src="assets/img/shopping-cart-template.png" alt="shopping cart template">
                <div class="caption">
                    <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span class="pull-right">$22.00</span></h4>
                </div>
            </div>
        </li>
        <li style="border:0"> &nbsp;</li>
        <li>
            <div class="thumbnail">
                <a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                <img src="assets/img/bootstrap-template.png" alt="bootstrap template">
                <div class="caption">
                    <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span class="pull-right">$22.00</span></h4>
                </div>
            </div>
        </li>
    </ul>

</div>
