<div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="{{ url('/home') }}" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">Nabila Bakery</span><span style="display: none;" class="logo-text-icon">µ</span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>

                <form id="topbar-search" action="#" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." onkeyup="myFunction()" id="nav-search" class="form-control text-white"/></div>
                </form>
                <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left text-white">News:</span>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown" style="width: 200px">
                    <select class="form-control input-sm mem_comp" onchange="regeneratedSession()" name="mem_comp">
                    @foreach(App\mMember::perusahaan() as $data)
                        <option  @if(Session::get('user_comp')==$data->c_id) selected="" @endif  value="{{$data->c_id}}">{{$data->c_name}}</option>
                       @endforeach
                    </select>
                    </li>
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="{{ asset('assets/images/avatar/48.jpg')}}" alt="" class="img-responsive img-circle">&nbsp;<span class="hidden-xs">{{ Auth::user()->name }}</span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>My Profile</a></li>
                            <li><a href="#"><i class="fa fa-calendar"></i>My Calendar</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>
                            <li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li>
                </ul>
            </div>
        </nav>
            <!-- BEGIN CONFIG MODAL PORTLET -->
            <div id="modal-config" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                                &times;</button>
                            <h4 class="modal-title">
                                Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et nisl eget
                                porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie.
                                Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis
                                magna et aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor
                                vitae quam dictum condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec
                                aliquam nisi, a mollis neque. Ut vel felis quis tellus hendrerit placerat. Vivamus
                                vel nisl non magna feugiat dignissim sed ut nibh. Nulla elementum, est a pretium
                                hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget massa. Sed ut
                                ultricies felis.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">
                                Close</button>
                            <button type="button" class="btn btn-primary">
                                Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <ul class="list-inline item-details">
                        <li><a href="http://themifycloud.com">Admin templates</a></li>
                        <li><a href="http://themescloud.org">Bootstrap themes</a></li>
                    </ul>
                </div>
            </div>
            <!-- END MODAL CONFIG PORTLET -->
        </div>
        <!-- END TOPBAR -->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">

                <ul id="side-menu" class="nav">

                    <div class="clearfix"></div>
                    <li class="menu-primer {{Request::is('master') ? 'active' : '' || Request::is('master/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">Master</span><span class="fa arrow"></span>
                        <!-- for filter -->
                        <span class="hidden">Master Data Suplier , Master Data Customer , Master Data Item Bahan Baku , Master Data Jenis Produksi , Master Data Pegawai , Master Data Akun Keuangan , Master Data Transaksi Keuangan , Master Data Barang</span>
                        <!-- =========== -->
                    </a>
                        <ul class="nav nav-second-level">
                            <li class="menu-sekunder {{ Request::is('master/datasuplier/suplier') ? 'active' : '' || Request::is('master/datasuplier/*') ? 'active' : '' }}"><a href="{{ url('/master/datasuplier/suplier') }}"><span class="submenu-title">Master Data Suplier</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('master/datacust/cust') ? 'active' : '' || Request::is('master/datacust/*') ? 'active' : '' }}"><a href="{{ url('/master/datacust/cust') }}"><span class="submenu-title">Master Data Customer</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('master/databaku/baku') ? 'active' : '' || Request::is('master/databaku/*') ? 'active' : '' }}"><a href="{{ url('/master/databaku/baku') }}"><span class="submenu-title">Master Data Item Bahan Baku</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('master/datajenis/jenis') ? 'active' : '' || Request::is('master/datajenis/*') ? 'active' : '' }}"><a href="{{ url('/master/datajenis/jenis') }}"><span class="submenu-title">Master Data Jenis Produksi</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('master/datapegawai/pegawai') ? 'active' : '' || Request::is('master/datapegawai/*') ? 'active' : '' }}"><a href="{{ url('/master/datapegawai/pegawai') }}"><span class="submenu-title">Master Data Pegawai</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('master/datakeuangan/keuangan') ? 'active' : '' || Request::is('master/datakeuangan/*') ? 'active' : '' }}"><a href="{{ url('/master/datakeuangan/keuangan') }}"><span class="submenu-title">Master Data Akun Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('master/datatransaksi/transaksi') ? 'active' : '' || Request::is('master/datatransaksi/*') ? 'active' : '' }}"><a href="{{ url('/master/datatransaksi/transaksi') }}"><span class="submenu-title">Master Data Transaksi Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('master/databarang/barang') ? 'active' : '' || Request::is('master/databarang/*') ? 'active' : '' }}"><a href="{{ url('/master/databarang/barang') }}"><span class="submenu-title">Master Data Barang</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-primer {{Request::is('purchasing') ? 'active' : '' || Request::is('purcahse-plan/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-credit-card fa-fw">
                        <div class="icon-bg bg-green"></div>
                        </i><span class="menu-title">Purchasing</span><span class="fa arrow"></span>
                        <!-- for filter -->
                        <span class="hidden">Rencana Bahan Baku Produksi , Rencana Pembelian , Order Pembelian , Belanja Harian , Return Pembelian</span></a>
                        <!-- ========== -->
                        <ul class="nav nav-second-level">
                            <li class="menu-sekunder {{ Request::is('purchasing/rencanabahanbaku/bahan') ? 'active' : '' || Request::is('purchasing/rencanabahanbaku/*') ? 'active' : '' }}">
                            <a href="{{ url('/purchasing/rencanabahanbaku/bahan') }}"><span class="submenu-title">Rencana Bahan Baku Produksi</span><span class="hidden">Purchasing</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('purcahse-plan/plan-index') ? 'active' : '' || Request::is('purchasing/rencanapembelian/*') ? 'active' : '' }}">
                            <a href="{{ url('/purcahse-plan/plan-index') }}"><span class="submenu-title">Rencana Pembelian</span><span class="hidden">Purchasing</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('purcahse-order/order-index') ? 'active' : '' || Request::is('purchasing/order/*') ? 'active' : '' }}">
                            <a href="{{ url('/purcahse-order/order-index') }}"><span class="submenu-title">Order Pembelian</span><span class="hidden">Purchasing</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('purchasing/orderpembelian/order') ? 'active' : '' || Request::is('purchasing/orderpembelian/*') ? 'active' : '' }}">
                            <a href="{{ url('/purchasing/orderpembelian/order') }}"><span class="submenu-title">Order Pembelian Barang Stok</span><span class="hidden">Purchasing</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('purchasing/belanjaharian/belanja') ? 'active' : '' || Request::is('purchasing/belanjaharian/*') ? 'active' : '' }}">
                            <a href="{{ url('/purchasing/belanjaharian/belanja') }}"><span class="submenu-title">Belanja Harian Barang Non Stok</span><span class="hidden">Purchasing</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('purchasing/returnpembelian/pembelian') ? 'active' : '' || Request::is('purchasing/returnpembelian/*') ? 'active' : '' }}">
                            <a href="{{ url('/purchasing/returnpembelian/pembelian') }}"><span class="submenu-title">Return Pembelian</span><span class="hidden">Purchasing</span></a>
                            </li>
                            <!-- <li class="menu-sekunder {{ Request::is('purchasing/belanjasuplier/suplier') ? 'active' : '' || Request::is('purchasing/belanjasuplier/suplier*') ? 'active' : '' }}">
                            <a href="{{ url('/purchasing/belanjasuplier/suplier') }}"><span class="submenu-title">Belanja Suplier</span></a>
                            </li> -->
                        </ul>
                    </li>

                    <li  class="menu-primer {{Request::is('inventory') ? 'active' : '' || Request::is('inventory/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-green"></div>
                        </i><span class="menu-title">Inventory</span><span class="fa arrow"></span>
                        <!-- for filter -->
                        <span class="hidden">Penerimaan Barang Suplier, Pengiriman Barang Hasil Produksi, Penerimaan Barang Hasil Produksi , Penerimaan Barang Return Customer , Barang Digunakan , Stock Opname</span>
                        <!-- =========== -->
                    </a>
                        <ul class="nav nav-second-level">
                            <li class="menu-sekunder {{ Request::is('inventory/p_suplier/suplier') ? 'active' : '' || Request::is('inventory/p_suplier/*') ? 'active' : '' }}"><a href="{{ url('/inventory/p_suplier/suplier') }}"><span class="submenu-title">Penerimaan Barang Suplier</span><span class="hidden">Inventory</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('inventory/pengirimanproduksi/pengirimanproduksi') ? 'active' : '' || Request::is('inventory/pengirimanproduksi/*') ? 'active' : '' }}"><a href="{{ url('/inventory/pengirimanproduksi/pengirimanproduksi') }}"><span class="submenu-title">Pengiriman Barang Hasil Produksi</span><span class="hidden">Inventory</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('inventory/p_hasilproduksi/produksi') ? 'active' : '' || Request::is('inventory/p_hasilproduksi/*') ? 'active' : '' }}"><a href="{{ url('/inventory/p_hasilproduksi/produksi') }}"><span class="submenu-title">Penerimaan Barang Hasil Produksi</span><span class="hidden">Inventory</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('inventory/p_returncustomer/cust') ? 'active' : '' || Request::is('inventory/p_returncustomer/*') ? 'active' : '' }}"><a href="{{ url('/inventory/p_returncustomer/cust') }}"><span class="submenu-title">Penerimaan Barang Return Customer</span><span class="hidden">Inventory</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('inventory/b_digunakan/barang') ? 'active' : '' || Request::is('inventory/b_digunakan/*') ? 'active' : '' }}"><a href="{{ url('/inventory/b_digunakan/barang') }}"><span class="submenu-title">Barang Digunakan</span><span class="hidden">Inventory</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('inventory/stockopname/opname') ? 'active' : '' || Request::is('inventory/stockopname/*') ? 'active' : '' }}"><a href="{{ url('/inventory/stockopname/opname') }}"><span class="submenu-title">Stock Opname</span><span class="hidden">Inventory</span></a>
                            </li>
                        </ul>
                    </li>

                    <li  class="menu-primer {{Request::is('produksi') ? 'active' : '' || Request::is('produksi/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-bar-chart-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                        </i><span class="menu-title">Produksi</span><span class="fa arrow"></span>
                        <!-- for filter -->
                        <span class="hidden">Monitoring Order & Stock , Rencana Produksi , Manajemen SPK , Manajemen Output Produksi , Manajemen Sampah (Waste)</span>
                        <!-- ========== -->
                    </a>
                        <ul class="nav nav-second-level">
                            <li class="menu-sekunder {{ Request::is('produksi/monitoringprogress/monitoring') ? 'active' : '' || Request::is('produksi/monitoringprogress/*') ? 'active' : '' }}"><a href="{{ url('/produksi/monitoringprogress/monitoring') }}"><span class="submenu-title">Monitoring Order & Stock</span><span class="hidden">Produksi</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('produksi/rencanaproduksi/produksi') ? 'active' : '' || Request::is('produksi/rencanaproduksi/*') ? 'active' : '' }}"><a href="{{ url('/produksi/rencanaproduksi/produksi') }}"><span class="submenu-title">Rencana Produksi</span><span class="hidden">Produksi</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('produksi/spk/spk') ? 'active' : '' || Request::is('produksi/spk/*') ? 'active' : '' }}"><a href="{{ url('/produksi/spk/spk') }}"><span class="submenu-title">Manajemen SPK</span><span class="hidden">Produksi</span></a>
                            </li>


                            <!-- <li class="menu-sekunder {{ Request::is('produksi/produksi/produksi2') ? 'active' : '' || Request::is('produksi/produksi/*') ? 'active' : '' }}"><a href="{{ url('/produksi/produksi/produksi2') }}"><span class="submenu-title">Manajemen Produksi</span><span class="hidden">Produksi</span></a>
                            </li> -->
                            <li class="menu-sekunder {{ Request::is('produksi/hasil-produksi') ? 'active' : '' }}"><a href="{{ url('produksi/hasil-produksi/index') }}"><span class="submenu-title">Manajemen Output Produksi</span><span class="hidden">Produksi</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('produksi/waste/waste') ? 'active' : '' || Request::is('produksi/waste/*') ? 'active' : '' }}"><a href="{{ url('/produksi/waste/waste') }}"><span class="submenu-title">Manajemen Sampah (Waste)</span><span class="hidden">Produksi</span></a>
                            </li>
                        </ul>
                    </li>

                    <li  class="menu-primer {{Request::is('penjualan') ? 'active' : '' || Request::is('penjualan/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-truck fa-fw">
                        <div class="icon-bg bg-green"></div>
                        </i><span class="menu-title">Penjualan</span><span class="fa arrow"></span>
                        <!-- for filter -->
                        <span class="hidden">
                            Manajemen Harga
                            Manajemen Promosi

                            Rencana Penjualan
                            POS Penjualan Toko / Mobil

                            POS Penjualan Pesanan
                            POS Penjualan Konsinyasi
                            Laporan Penjualan Mobile Sales
                            Manajemen Return Penjualan
                            Penjualan Produk Langsung Jual
                            Penjualan Produk Expired
                            Konsinyasi
                            Monitoring Progress Penjualan
                            Mutasi Stock
                        </span>
                    <!-- ======= -->
                    </a>
                        <ul class="nav nav-second-level">
                            <li class="menu-sekunder {{ Request::is('penjualan/manajemenharga/harga') ? 'active' : '' || Request::is('penjualan/manajemenharga/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/manajemenharga/harga') }}"><span class="submenu-title">Manajemen Harga</span><span class="hidden">Penjualan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('penjualan/manajemenpromosi/promosi') ? 'active' : '' || Request::is('penjualan/manajemenpromosi/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/manajemenpromosi/promosi') }}"><span class="submenu-title">Manajemen Promosi</span><span class="hidden">Penjualan</span></a>
                            </li>
                            <!-- <li class="menu-sekunder {{ Request::is('penjualan/layananpesanan/layananpesanan') ? 'active' : '' || Request::is('penjualan/layananpesanan/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/layananpesanan/layananpesanan') }}"><span class="submenu-title">Layanan Pesanan</span><span class="hidden">Penjualan</span></a>
                            </li> -->
                            <li class="menu-sekunder {{ Request::is('penjualan/rencanapenjualan/rencana') ? 'active' : '' || Request::is('penjualan/rencanapenjualan/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/rencanapenjualan/rencana') }}"><span class="submenu-title">Rencana Penjualan</span><span class="hidden">Penjualan</span></a>
                            </li>
                            <li class="menu-sekunder {{
                            Request::is('penjualan/POSpenjualan/POSpenjualan') ? 'active' : ''
                            || Request::is('penjualan/pos-toko/*') ? 'active' : ''
                            || Request::is('penjualan/POSpenjualanmobile/POSpenjualanmobile') ? 'active' : ''
                            || Request::is('penjualan/POSpenjualanmobile/*') ? 'active' : ''
                            || Request::is('penjualan/POSpenjualanToko/POSpenjualanToko') ? 'active' : ''
                            || Request::is('penjualan/POSpenjualanToko/*') ? 'active' : ''
                        }}"><a href="{{ url('/penjualan/POSpenjualan/POSpenjualan') }}"><span class="submenu-title">POS Penjualan Toko / Mobil</span><span class="hidden">Penjualan</span></a>
                            </li><!--
                            <li class="menu-sekunder {{ Request::is('penjualan/POSpenjualanmobile/POSpenjualanmobile') ? 'active' : '' || Request::is('penjualan/POSpenjualanmobile/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/POSpenjualanmobile/POSpenjualanmobile') }}"><span class="submenu-title">POS Penjualan Mobile</span><span class="hidden">Penjualan</span></a>
                            </li> -->
                            <li class="menu-sekunder {{ Request::is('penjualan/pos-pesanan/index') ? 'active' : '' || Request::is('penjualan/pos-pesanan/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/pos-pesanan/index') }}"><span class="submenu-title">POS Penjualan Pesanan</span><span class="hidden">Penjualan</span></a>
                            </li>

                            <li class="menu-sekunder {{ Request::is('penjualan/barang-titipan/index') ? 'active' : '' || Request::is('penjualan/barang-titipan/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/barang-titipan/index') }}"><span class="submenu-title">Catat Barang Titipan</span><span class="hidden">Penjualan</span></a>
                            </li>

                            <li class="menu-sekunder {{ Request::is('penjualan/barang-titip/index') ? 'active' : '' || Request::is('penjualan/barang-titip/*') ? 'active' : '' }}"><a href="{{ url('penjualan/barang-titip/index') }}"><span class="submenu-title">Catat Barang Titip</span></a>
                            </li>


                            <li class="menu-sekunder {{ Request::is('penjualan/POSpenjualankonsinyasi/POSpenjualankonsinyasi') ? 'active' : '' || Request::is('penjualan/POSpenjualankonsinyasi/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/POSpenjualankonsinyasi/POSpenjualankonsinyasi') }}"><span class="submenu-title">POS Penjualan Konsinyasi</span><span class="hidden">Penjualan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('penjualan/penjualanmobile/penjualanmobile') ? 'active' : '' || Request::is('penjualan/penjualanmobile/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/penjualanmobile/penjualanmobile') }}"><span class="submenu-title">Laporan Penjualan Mobile Sales</span><span class="hidden">Penjualan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('penjualan/mutasistok/mutasi') ? 'active' : '' || Request::is('penjualan/mutasistok/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/mutasistok/mutasi') }}"><span class="submenu-title">Mutasi Stock</span><span class="hidden">Penjualan</span></a>
                            </li>

                            <li class="menu-sekunder {{ Request::is('penjualan/mutasi-item/index') ? 'active' : '' || Request::is('penjualan/mutasi-item/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/mutasi-item/index') }}"><span class="submenu-title">Mutasi Item</span><span class="hidden">Penjualan</span></a>
                            </li>

                            <li class="menu-sekunder {{ Request::is('penjualan/manajemenreturn/r_penjualan') ? 'active' : '' || Request::is('penjualan/manajemenreturn/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/manajemenreturn/r_penjualan') }}"><span class="submenu-title">Manajemen Return Penjualan</span><span class="hidden">Penjualan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('penjualan/produklangsung/produklangsung') ? 'active' : '' || Request::is('penjualan/produklangsung/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/produklangsung/produklangsung') }}"><span class="submenu-title">Penjualan Produk Langsung Jual</span><span class="hidden">Penjualan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('penjualan/penjualanexpired/penjualanexpired') ? 'active' : '' || Request::is('penjualan/penjualanexpired/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/penjualanexpired/penjualanexpired') }}"><span class="submenu-title">Penjualan Produk Expired</span><span class="hidden">Penjualan</span></a>
                            </li>
                            <!-- <li class="menu-sekunder {{ Request::is('penjualan/konsinyasi/konsinyasi') ? 'active' : '' || Request::is('penjualan/konsinyasi/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/konsinyasi/konsinyasi') }}"><span class="submenu-title">Konsinyasi</span><span class="hidden">Penjualan</span></a>
                            </li> -->
                            <li class="menu-sekunder {{ Request::is('penjualan/monitorprogress/progress') ? 'active' : '' || Request::is('penjualan/monitorprogress/progress/*') ? 'active' : '' }}"><a href="{{ url('/penjualan/monitorprogress/progress') }}"><span class="submenu-title">Monitoring Progress Penjualan</span><span class="hidden">Penjualan</span></a>
                            </li>
                        </ul>
                    </li>

                    <li  class="menu-primer {{Request::is('hrd') ? 'active' : '' || Request::is('hrd/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-users fa-fw">
                        <div class="icon-bg bg-green"></div>
                        </i><span class="menu-title">HRD</span><span class="fa arrow"></span>
                        <span class="hidden">Data Administrasi Pegawai
                    Data Lembur Pegawai
                    Scoreboard Pegawai Per Hari
                    Payroll
                    Manajemen KPI Pegawai
                    Training Pegawai
                    Recruitment</span>
                    </a>
                        <ul class="nav nav-second-level">
                            <!-- <li class="menu-sekunder {{ Request::is('hrd/datakaryawan/karyawan') ? 'active' : '' || Request::is('hrd/datakaryawan/*') ? 'active' : '' }}"><a href="{{ url('/hrd/datakaryawan/karyawan')}}"><span class="submenu-title">Data Karyawan</span><span class="hidden">HRD</span></a>
                            </li> -->
                            <li class="menu-sekunder {{ Request::is('hrd/dataadministrasi/admin') ? 'active' : '' || Request::is('hrd/dataadministrasi/*') ? 'active' : '' }}"><a href="{{ url('/hrd/dataadministrasi/admin')}}"><span class="submenu-title">Data Administrasi Pegawai</span><span class="hidden">HRD</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('hrd/datalembur/lembur') ? 'active' : '' || Request::is('hrd/datalembur/*') ? 'active' : '' }}"><a href="{{ url('/hrd/datalembur/lembur')}}"><span class="submenu-title">Data Lembur Pegawai</span><span class="hidden">HRD</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('hrd/scoreboard/score') ? 'active' : '' || Request::is('hrd/scoreboard/*') ? 'active' : '' }}"><a href="{{ url('/hrd/scoreboard/score')}}"><span class="submenu-title">Scoreboard Pegawai Per Hari</span><span class="hidden">HRD</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('hrd/payroll/payroll') ? 'active' : '' || Request::is('hrd/payroll/*') ? 'active' : '' }}"><a href="{{ url('/hrd/payroll/payroll') }}"><span class="submenu-title">Payroll</span><span class="hidden">HRD</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('hrd/manajemenkpipegawai/kpi') ? 'active' : '' || Request::is('hrd/manajemenkpipegawai/*') ? 'active' : '' }}"><a href="{{ url('/hrd/manajemenkpipegawai/kpi') }}"><span class="submenu-title">Manajemen KPI Pegawai</span><span class="hidden">HRD</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('hrd/training/training') ? 'active' : '' || Request::is('hrd/training/*') ? 'active' : '' }}"><a href="{{ url('/hrd/training/training')}}"><span class="submenu-title">Training Pegawai</span><span class="hidden">HRD</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('hrd/recruitment/rekrut') ? 'active' : '' || Request::is('hrd/recruitment/*') ? 'active' : '' }}"><a href="{{ url('/hrd/recruitment/rekrut') }}"><span class="submenu-title">Recruitment</span><span class="hidden">HRD</span></a>
                            </li>
                        </ul>
                    </li>

                    <li  class="menu-primer {{Request::is('keuangan') ? 'active' : '' || Request::is('keuangan/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-money fa-fw">
                        <div class="icon-bg bg-green"></div>
                        </i><span class="menu-title">Keuangan</span><span class="fa arrow"></span>
                        <span class="hidden">Manajemen SPK , Proses Input Transaksi , Laporan Hutang Piutang , Laporan Keuangan , Analisa Progress Terhadap Perencanaan , Analisa Net Profit Terhadap OCF , Analisa Pertumbuhan Aset , Analisa Cashflow , Analisa Common Size dan Index , Analisa Rasio Keuangan , Analisa Three Bottom Line , Analisa ROE</span>
                    </a>
                        <ul class="nav nav-second-level">
                            <li class="menu-sekunder {{ Request::is('konfirmasi-purchase/index') ? 'active' : '' }}"><a href="{{ url('/konfirmasi-purchase/index') }}"><span class="submenu-title">konfirmasi Pembelian</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/spk/spk') ? 'active' : '' || Request::is('keuangan/spk/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/spk/spk') }}"><span class="submenu-title">Manajemen SPK</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/p_inputtransaksi/transaksi') ? 'active' : '' || Request::is('keuangan/p_inputtransaksi/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/p_inputtransaksi/transaksi') }}"><span class="submenu-title">Proses Input Transaksi</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/l_hutangpiutang/hutang') ? 'active' : '' || Request::is('keuangan/l_hutangpiutang/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/l_hutangpiutang/hutang') }}"><span class="submenu-title">Laporan Hutang Piutang</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/l_jurnal/jurnal') ? 'active' : '' || Request::is('keuangan/l_jurnal/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/l_jurnal/jurnal') }}"><span class="submenu-title">Laporan Keuangan</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/analisaprogress/analisa') ? 'active' : '' || Request::is('keuangan/analisaprogress/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/analisaprogress/analisa') }}"><span class="submenu-title">Analisa Progress Terhadap Perencanaan</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/analisaocf/analisa2') ? 'active' : '' || Request::is('keuangan/analisaocf/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/analisaocf/analisa2') }}"><span class="submenu-title">Analisa Net Profit Terhadap OCF</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/analisaaset/analisa3') ? 'active' : '' || Request::is('keuangan/analisaaset/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/analisaaset/analisa3') }}"><span class="submenu-title">Analisa Pertumbuhan Aset</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/analisacashflow/analisa4') ? 'active' : '' || Request::is('keuangan/analisacashflow/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/analisacashflow/analisa4') }}"><span class="submenu-title">Analisa Cashflow</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/analisaindex/analisa5') ? 'active' : '' || Request::is('keuangan/analisaindex/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/analisaindex/analisa5') }}"><span class="submenu-title">Analisa Common Size dan Index</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/analisarasio/analisa6') ? 'active' : '' || Request::is('keuangan/analisarasio/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/analisarasio/analisa6') }}"><span class="submenu-title">Analisa Rasio Keuangan</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/analisabottom/analisa7') ? 'active' : '' || Request::is('keuangan/analisabottom/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/analisabottom/analisa7') }}"><span class="submenu-title">Analisa Three Bottom Line</span><span class="hidden">Keuangan</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('keuangan/analisaroe/analisa8') ? 'active' : '' || Request::is('keuangan/analisaroe/*') ? 'active' : '' }}"><a href="{{ url('/keuangan/analisaroe/analisa8') }}"><span class="submenu-title">Analisa ROE</span><span class="hidden">Keuangan</span></a>
                            </li>
                        </ul>
                    </li>

                    <li  class="menu-primer {{Request::is('system') ? 'active' : '' || Request::is('system/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-cog fa-fw fa-spin">
                        <div class="icon-bg bg-green"></div>
                        </i><span class="menu-title">System</span><span class="fa arrow"></span>
                        <span class="hidden">
                            Manajemen User
                    Manajemen Hak Akses
                    Profil Perusahaan
                    Tahun Finansial
                        </span>
                    </a>


                        <ul class="nav nav-second-level">
                            <li class="menu-sekunder {{ Request::is('system/hakuser/user') ? 'active' : '' || Request::is('system/hakuser/*') ? 'active' : '' }}"><a href="{{ url('/system/hakuser/user') }}"><span class="submenu-title">Manajemen User</span><span class="hidden">System</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('system/hakakses/akses') ? 'active' : '' || Request::is('system/hakakses/*') ? 'active' : '' }}"><a href="{{ url('/system/hakakses/akses') }}"><span class="submenu-title">Manajemen Hak Akses</span><span class="hidden">System</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('system/profilperusahaan/profil') ? 'active' : '' || Request::is('system/profilperusahaan/*') ? 'active' : '' }}"><a href="{{ url('/system/profilperusahaan/profil') }}"><span class="submenu-title">Profil Perusahaan</span><span class="hidden">System</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('system/thnfinansial/finansial') ? 'active' : '' || Request::is('system/thnfinansial/*') ? 'active' : '' }}"><a href="{{ url('/system/thnfinansial/finansial') }}"><span class="submenu-title">Tahun Finansial</span><span class="hidden">System</span></a>
                            </li>
                        </ul>
                    </li>
                    <li  class="menu-primer {{Request::is('nabila') ? 'active' : '' || Request::is('nabila/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-fw">N
                        <div class="icon-bg bg-green"></div>
                        </i><span class="menu-title">Nabila Moslem</span><span class="fa arrow"></span>
                        <span class="hidden">
                            Membership
                            Belanja Karyawan
                            Voucher Belanja
                            Reseller
                            Marketer Online
                            Return
                            Purchasing
                        </span>
                    </a>


                        <ul class="nav nav-second-level">
                            <li class="menu-sekunder {{ Request::is('nabila/membership/member') ? 'active' : '' || Request::is('nabila/membership/*') ? 'active' : '' }}"><a href="{{ url('/nabila/membership/member') }}"><span class="submenu-title">Membership</span><span class="hidden">Nabila Moslem</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('nabila/belanjakaryawan/belanja') ? 'active' : '' || Request::is('nabila/belanjakaryawan/*') ? 'active' : '' }}"><a href="{{ url('/nabila/belanjakaryawan/belanja') }}"><span class="submenu-title">Belanja Karyawan</span><span class="hidden">Nabila Moslem</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('nabila/voucherbelanja/voucher') ? 'active' : '' || Request::is('nabila/voucherbelanja/*') ? 'active' : '' }}"><a href="{{ url('/nabila/voucherbelanja/voucher') }}"><span class="submenu-title">Voucher Belanja</span><span class="hidden">Nabila Moslem</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('nabila/reseller/reseller') ? 'active' : '' || Request::is('nabila/reseller/*') ? 'active' : '' }}"><a href="{{ url('/nabila/reseller/reseller') }}"><span class="submenu-title">Reseller</span><span class="hidden">Nabila Moslem</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('nabila/marketer/marketer') ? 'active' : '' || Request::is('nabila/marketer/*') ? 'active' : '' }}"><a href="{{ url('/nabila/marketer/marketer') }}"><span class="submenu-title">Marketer Online</span><span class="hidden">Nabila Moslem</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('nabila/return/return') ? 'active' : '' || Request::is('nabila/return/*') ? 'active' : '' }}"><a href="{{ url('/nabila/return/return') }}"><span class="submenu-title">Return</span><span class="hidden">Nabila Moslem</span></a>
                            </li>
                            <li class="menu-sekunder {{ Request::is('nabila/purchasing/purchasing') ? 'active' : '' || Request::is('nabila/purchasing/*') ? 'active' : '' }}"><a href="{{ url('/nabila/purchasing/purchasing') }}"><span class="submenu-title">Purchasing</span><span class="hidden">Nabila Moslem</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>

        <div>
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
            <!--BEGIN CHAT FORM-->
            <div id="chat-form" class="fixed">
                <div class="chat-inner">
                    <h2 class="chat-header">
                        <a href="javascript:;" class="chat-form-close pull-right"><i class="glyphicon glyphicon-remove">
                        </i></a><i class="fa fa-users"></i>&nbsp; Message &nbsp;<span class="badge badge-info">3</span></h2>
                    <div id="group-1" class="chat-group">
                        <strong>Favorites</strong><a href="#"><span class="user-status is-online"></span> <small>
                            Verna Morton</small> <span class="badge badge-info">2</span></a><a href="#"><span
                                class="user-status is-online"></span> <small>Delores Blake</small> <span class="badge badge-info is-hidden">
                                    0</span></a><a href="#"><span class="user-status is-busy"></span> <small>Nathaniel Morris</small>
                                        <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-idle"></span>
                                            <small>Boyd Bridges</small> <span class="badge badge-info is-hidden">0</span></a><a
                                                href="#"><span class="user-status is-offline"></span> <small>Meredith Houston</small>
                                                <span class="badge badge-info is-hidden">0</span></a></div>
                    <div id="group-2" class="chat-group">
                        <strong>Office</strong><a href="#"><span class="user-status is-busy"></span> <small>
                            Ann Scott</small> <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                                class="user-status is-offline"></span> <small>Sherman Stokes</small> <span class="badge badge-info is-hidden">
                                    0</span></a><a href="#"><span class="user-status is-offline"></span> <small>Florence
                                        Pierce</small> <span class="badge badge-info">1</span></a></div>
                    <div id="group-3" class="chat-group">
                        <strong>Friends</strong><a href="#"><span class="user-status is-online"></span> <small>
                            Willard Mckenzie</small> <span class="badge badge-info is-hidden">0</span></a><a
                                href="#"><span class="user-status is-busy"></span> <small>Jenny Frazier</small>
                                <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-offline"></span>
                                    <small>Chris Stewart</small> <span class="badge badge-info is-hidden">0</span></a><a
                                        href="#"><span class="user-status is-offline"></span> <small>Olivia Green</small>
                                        <span class="badge badge-info is-hidden">0</span></a></div>
                </div>
                <div id="chat-box" style="top: 400px">
                    <div class="chat-box-header">
                        <a href="#" class="chat-box-close pull-right"><i class="glyphicon glyphicon-remove">
                        </i></a><span class="user-status is-online"></span><span class="display-name">Willard
                            Mckenzie</span> <small>Online</small>
                    </div>
                    <div class="chat-content">
                        <ul class="chat-box-body">
                            <li>
                                <p>
                                    <img src="{{asset('assets/images/avatar/128.jpg')}}" class="avt" /><span class="user">John Doe</span><span
                                        class="time">09:33</span></p>
                                <p>
                                    Hi Swlabs, we have some comments for you.</p>
                            </li>
                            <li class="odd">
                                <p>
                                    <img src="{{asset('assets/images/avatar/48.jpg')}}" class="avt" /><span class="user">Swlabs</span><span
                                        class="time">09:33</span></p>
                                <p>
                                    Hi, we're listening you...</p>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-textarea">
                        <input placeholder="Type your message" class="form-control" /></div>
                </div>
            </div>
            <!--END CHAT FORM-->
<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("nav-search");
    filter = input.value.toLowerCase();
    ul = document.getElementById("side-menu");
    li = ul.getElementsByTagName("li");

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toLowerCase().indexOf(filter) > -1) {

            li[i].style.display = "";

        } else {

            li[i].style.display = "none";

        }

    }
}

// $('#side-menu').searchable({
//     searchField: '#nav-search',
//     selector: 'li',
//     childSelector: '.submenu-title',
//     show: function( elem ) {
//         elem.slideDown(100);
//     },
//     hide: function( elem ) {
//         elem.slideUp( 100 );
//     }
// })
</script>
