	 <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Quick Post</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    
                      <div class="form quick-post">
                                      <!-- Edit profile form (not working)-->
									  <?php echo $this->session->flashdata('message'); ?>
                                      <form action="<?php echo site_url('Admin/Rak/tambah_rak'); ?>" method="POST" class="form-horizontal">
                                          <!-- Title -->
										  <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Nomor Rak</label>
                                            <div class="col-lg-10"> 
                                              <input name="no_rak" type="text" class="form-control" id="title">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Nama Rak</label>
                                            <div class="col-lg-10"> 
                                              <input name="nama_rak" type="text" class="form-control" id="title">
                                            </div>
                                          </div>   
                                                  
                                          <!-- Cateogry -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-2">Kategori</label>
                                            <div class="col-lg-10">                               
                                                <select name="" class="form-control">
                                                  <option value="">- Pilih Kategori -</option>
                                                  <option value="1">1</option>
                                                  <option value="2">2</option>
                                                  
                                                </select>  
                                            </div>
                                          </div>              
                                          <!-- Tags -->
                                          
                                          
                                          <!-- Buttons -->
                                          <div class="form-group">
                                             <!-- Buttons -->
											 <div class="col-lg-offset-2 col-lg-9">
												<button type="submit" class="btn btn-danger">Simpan</button>
												<button type="reset" class="btn btn-default">Reset</button>
											 </div>
                                          </div>
                                      </form>
                                    </div>
                  

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>