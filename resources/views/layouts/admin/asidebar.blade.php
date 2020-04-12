<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>


            <li>
                <a href="{{url('/')}}/admin">
                    <i class="fa fa-th"></i> <span>Anasayfa</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i> <span>Ürün İşlemleri</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
             </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/')}}/admin/urunler"><i class="fa fa-circle-o"></i> Kitap Listesi</a></li>
                    <li><a href="{{url('/')}}/admin/turler"><i class="fa fa-circle-o"></i> Türler</a></li>
                    <li><a href="{{url('/')}}/admin/kategoriler"><i class="fa fa-circle-o"></i> Kategoriler</a></li>
                    <li><a href="{{url('/')}}/admin/yayinevleri"><i class="fa fa-circle-o"></i> Yayın Evleri</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="{{url('/')}}/admin/siparisler">
                    <i class="fa fa-pie-chart"></i> <span>Siparişler</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
             </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/')}}/admin/siparis_yeni"><i class="fa fa-circle-o"></i> Yeni Siparişler</a></li>
                    <li><a href="{{url('/')}}/admin/siparisler/Onaylandi"><i class="fa fa-circle-o"></i> Onaylanan Siparişler</a></li>
                    <li><a href="{{url('/')}}/admin/siparisler/Kargoda"><i class="fa fa-circle-o"></i> Kargodakiler</a></li>
                    <li><a href="{{url('/')}}/admin/siparisler/Tamamlandi"><i class="fa fa-circle-o"></i> Bitenler</a></li>
                    <li><a href="{{url('/')}}/admin/siparisler/İptal"><i class="fa fa-circle-o"></i> Bitenler</a></li>
                </ul>
            </li>



            <li>
                <a href="{{url('/')}}/admin/mesajlar">
                    <i class="fa fa-th"></i> <span>Müşteri Mesajları</span>
                </a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/uyeler">
                    <i class="fa fa-th"></i> <span>Üyeler</span>
                </a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/settings">
                    <i class="fa fa-cog"></i> <span>Ayarlar</span>
                </a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/yorumlar">
                    <i class="fa fa-th"></i> <span>Yorumlar</span>
                </a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/sorular">
                    <i class="fa fa-th"></i> <span>SSS</span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>