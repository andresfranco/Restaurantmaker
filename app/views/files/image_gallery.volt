{% extends "layouts/masterpage_standard.volt" %}

{% block pageheader %}
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{static_url('metronic/assets/global/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{static_url('metronic/assets/admin/pages/css/portfolio.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
{% endblock %}
{% block javascripts %}
    <script type="text/javascript" src="{{static_url('metronic/assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js')}}"></script>
    <script type="text/javascript" src="{{static_url('metronic/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}"></script>
    <script src="{{static_url('metronic/assets/admin/pages/scripts/portfolio.js')}}"></script>
    <script>
        jQuery(document).ready(function()
        {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
            Portfolio.init();

        });
    </script>

{% endblock %}
{% block pagetitle %}
    <h3 class="page-title" align ="left">
        {{title|t}}
    </h3>
    <hr/>
{% endblock %}
{% block pagebar %}
{% endblock %}
{% block content %}
    <div class="margin-top-10">
        <div class="row mix-grid">
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_1 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img1.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto odio</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img2.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_2 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img2.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img2.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_3 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img3.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img3.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_1 category_2 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img4.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img4.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_2 category_1 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img5.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img5.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_1 category_2 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img6.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img6.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_2 category_3 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img1.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img1.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_1 category_2 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img2.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img2.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_3 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img4.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img4.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div style="display: block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_1 mix_all">
                <div class="mix-inner">
                    <img class="img-responsive" src="{{static_url('metronic/assets/admin/pages/media/works/img3.jpg')}}" alt="">
                    <div class="mix-details">
                        <h4>Cascusamus et iusto accusamus</h4>
                        <a class="mix-link">
                            <i class="fa fa-link"></i>
                        </a>
                        <a class="mix-preview fancybox-button" href="{{static_url('metronic/assets/admin/pages/media/works/img3.jpg')}}" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock%}