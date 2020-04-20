			<!-- start: Main Menu -->
			<? if ( $_SESSION['meet_admin_rule']=="MASTER" ) { ?>
			<div id="sidebar-left" class="span2" style="display:none;width:0">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 카테고리 관리</span><!--<span class="label label-important"> 3 </span>--></a>
							<ul>

								<li><a class="submenu" href="/@admin/etc/main_category.php"><i class="icon-file-alt"></i><span class="hidden-tablet">카테고리 관리</span></a></li>
							</ul>
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 회원 관리</span><!--<span class="label label-important"> 3 </span>--></a>
							<ul>

								<li><a class="submenu" href="/@admin/member/member_list.php"><i class="icon-file-alt"></i><span class="hidden-tablet">회원 관리</span></a></li>
							</ul>
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 업체 관리</span><!--<span class="label label-important"> 3 </span>--></a>
							<ul>

								<li><a class="submenu" href="/@admin/store/info_list.php"><i class="icon-file-alt"></i><span class="hidden-tablet">업체 관리</span></a></li>
								<li><a class="submenu" href="/@admin/store/info_view.php"><i class="icon-file-alt"></i><span class="hidden-tablet">신규 업체 등록</span></a></li>
							</ul>
						</li>


						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 게시판관리</span></a>
							<ul>
								<li><a class="submenu" href="/@admin/board/board.php?t=notice&group=Y"><i class="icon-file-alt"></i><span class="hidden-tablet">공지사항/이벤트</span></a></li>
								<li><a class="submenu" href="/@admin/board/board.php?t=faq"><i class="icon-file-alt"></i><span class="hidden-tablet">자주하는질문</span></a></li>
								<li><a class="submenu" href="/@admin/board/board.php?t=tv"><i class="icon-file-alt"></i><span class="hidden-tablet">Fitpl TV</span></a></li>

							</ul>
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 기타관리</span></a>
							<ul>
								<li><a class="submenu" href="/@admin/etc/popup_list.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Hot fitpl 관리</span></a></li>
								<li><a class="submenu" href="/@admin/etc/banner_list.php"><i class="icon-file-alt"></i><span class="hidden-tablet">메인배너 관리</span></a></li>
								<li><a class="submenu" href="/@admin/board/board.php?t=push"><i class="icon-file-alt"></i><span class="hidden-tablet">푸시발송 관리</span></a></li>
							</ul>
						</li>

					</ul>
				</div>
			</div>
			<? } else { ?>
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 예약관리</span></a>
							<ul>
								<li><a class="submenu" href="/@admin/rev/rev_list.php"><i class="icon-file-alt"></i><span class="hidden-tablet">예약관리</span></a></li>

							</ul>
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> 업체 관리</span><!--<span class="label label-important"> 3 </span>--></a>
							<ul>
								<li><a class="submenu" href="/@admin/store/info_list.php"><i class="icon-file-alt"></i><span class="hidden-tablet">업체 관리</span></a></li>
								<li><a class="submenu" href="/@admin/board/board.php?t=admin"><i class="icon-file-alt"></i><span class="hidden-tablet">관리자 Q&A</span></a></li>
							</ul>
						</li>



					</ul>
				</div>
			</div>
			<? } ?>

			<!-- end: Main Menu -->