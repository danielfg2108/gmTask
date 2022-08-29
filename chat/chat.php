<?php require_once '../header.php'; ?>
<link rel="stylesheet" href="estilos_chat.css">

<!DOCTYPE HTML>
<html lang="es">
<head>
  <title>Messenger</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"/>
</head>
<body>
  <div class="main-wrapper">
    <div class="container">
      <div class="page-content">
        <div class="container mt-5">
          <div class="row">
            <div class="col-md-4 col-12 card-stacked">
              <div class="card shadow-line mb-3 chat">
                <div class="chat-user-detail">
                  <div class="p-3 chat-header">
                    <div class="w-100">
                      <div class="d-flex pl-0">
                        <div class="d-flex flex-row mt-1 mb-1">
                          <span class="margin-auto mr-2">
                            <a href="#" class="user-undetail-trigger btn btn-sm btn-icon btn-light active text-dark ml-2">
                              <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="feather">
                                <polyline points="15 18 9 12 15 6"></polyline>
                              </svg>
                            </a>
                          </span>
                          <p class="margin-auto fw-400 text-dark-75">Profile</p>
                        </div>
                        <div>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                </div>

                <div class="p-3 chat-header">
                  <div class="d-flex">
                    <div class="w-100 d-flex pl-0">
                      <img class="user-detail-trigger rounded-circle shadow avatar-sm mr-3 chat-profile-picture" src="https://user-images.githubusercontent.com/35243461/168796876-2e363a49-b32c-4218-b5a3-ce12493af69e.jpg" />
                    </div>
                  </div>
                </div>
                
                <div class="chat-search pl-3 pr-3">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar">
                    <div class="input-group-append prepend-white">
                      <span class="input-group-text pl-2 pr-2">
                        <i class="fs-17 las la-search drop-shadow"></i>
                      </span>
                    </div>
                  </div>
                </div>
             
                <div class="chat-user-panel">
                  <div class="pb-3 d-flex flex-column navigation-mobile pagination-scrool chat-user-scroll">
                  

                    <div class="chat-item active d-flex pl-3 pr-0 pt-3 pb-3">
                      <div class="w-100">
                        <div class="d-flex pl-0">
                          <img class="rounded-circle shadow avatar-sm mr-3" src="https://user-images.githubusercontent.com/35243461/168796877-f6c8819a-5d6e-4b2a-bd56-04963639239b.jpg">
                          <div>
                            <p class="margin-auto fw-400 text-dark-75">Beate Lemoine</p>
                            <div class="d-flex flex-row mt-1">
                              <span class="message-shortcut margin-auto fw-400 fs-13 ml-1 mr-4">Hey Quan, If you are free now we can meet tonight ?</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex-shrink-0 margin-auto pl-2 pr-3">
                        <div class="d-flex flex-column">
                          <p class="text-muted text-right fs-13 mb-2">08:21</p>                    
                        </div>
                      </div>
                    </div>
                    
                 
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-12 card-stacked">
              <div class="card shadow-line mb-3 chat chat-panel">
                <div class="p-3 chat-header">
                  <div class="d-flex">
                    <div class="w-100 d-flex pl-0">
                      <img class="rounded-circle shadow avatar-sm mr-3 chat-profile-picture" src="https://user-images.githubusercontent.com/35243461/168796877-f6c8819a-5d6e-4b2a-bd56-04963639239b.jpg">
                      <div class="mr-3">
                        <a href="!#">
                          <p class="fw-400 mb-0 text-dark-75">Beate Lemoine</p>
                        </a>
                      </div>
                    </div>
                  
                  </div>
                </div>
                <div class="d-flex flex-row mb-3 navigation-mobile scrollable-chat-panel chat-panel-scroll">
                  <div class="w-100 p-3">
                    <div class="left-chat-message fs-13 mb-2">
                      <p class="mb-0 mr-3 pr-4">Hi, Quan</p>
                      <div class="message-options">
                        <div class="message-time">06:15</div>
                        <div class="message-arrow"><i class="text-muted la la-angle-down fs-17"></i></div>
                      </div>
                    </div>
                    <div class="d-flex flex-row-reverse mb-2">
                      <div class="right-chat-message fs-13 mb-2">
                        <div class="mb-0 mr-3 pr-4">
                          <div class="d-flex flex-row">
                            <div class="pr-2">Hey, Beate</div>
                            <div class="pr-4"></div>
                          </div>
                        </div>
                        <div class="message-options dark">
                          <div class="message-time">
                            <div class="d-flex flex-row">
                              <div class="mr-2">06:49</div>
                              <div class="svg15 double-check"></div>
                            </div>
                          </div>
                          <div class="message-arrow"><i class="text-muted la la-angle-down fs-17"></i></div>
                        </div>
                      </div>
                    </div>
                  
                  </div>
                </div>


                <div class="chat-search pl-3 pr-3">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Write a message">
                    <div class="input-group-append prepend-white">
                      <span class="input-group-text pl-2 pr-2">
                        <i class="chat-upload-trigger fs-19 bi bi-file-earmark-plus ml-2 mr-2"></i>                      
                        <i class="fs-19 bi bi-cursor ml-2 mr-2"></i>
                      </span>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>
</body>
</html>
<script>
     (function($) {
      "use strict";
      $('.scrollable-chat-panel').perfectScrollbar();
      var position = $(".chat-search").last().position().top;
      $('.scrollable-chat-panel').scrollTop(position);
      $('.scrollable-chat-panel').perfectScrollbar('update');
      $('.pagination-scrool').perfectScrollbar();

      $('.chat-upload-trigger').on('click', function(e) {
        $(this).parent().find('.chat-upload').toggleClass("active");
      });
      $('.user-detail-trigger').on('click', function(e) {
        $(this).closest('.chat').find('.chat-user-detail').toggleClass("active");
      });
      $('.user-undetail-trigger').on('click', function(e) {
        $(this).closest('.chat').find('.chat-user-detail').toggleClass("active");
      });
    })(jQuery); 
</script>

 <?php require_once '../footer.php'; ?>

