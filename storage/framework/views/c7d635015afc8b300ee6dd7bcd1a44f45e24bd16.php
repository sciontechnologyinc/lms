<?php $__env->startSection('content'); ?>
<div class="searchbar">
    <div class="bar-row">
        <div class="bookname"><input type="text" class="searchbartext" placeholder="Book Name"/></div>
        <div class="authorname"><input type="text" class="searchbartext" placeholder="Author Name"/></div>
        <div class="publishername"><input type="text" class="searchbartext" placeholder="Publisher Name"/></div>
        <div class="searchbtn">Search</div>
    </div>
    
</div>

<div class="booklist-container">

    <div class="booklist-title">List of Books</div>
    <div class="booklist-row">
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="perbook-container" data-toggle="modal" data-target="#myModal">
        
            <div class="perbook-img"><img src="<?php echo e(asset('storage/uploads/book_icon.png')); ?>" alt=""></div>
            <div class="perbook-title" ><?php echo e($book->bookname); ?> </div>
        </div>
    
        </div>
    </div>
</div>


<!-- The Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e($book->bookname); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="book-isbn">Book ISBN No. : <?php echo e($book->ISBN); ?></div>
        <div class="availbook-number">Available Book No. : <?php echo e($book->booknumber); ?></div>
        <div class="book-price">Book Price : <?php echo e($book->bookprice); ?></div>
        <div class="writer-name">Writer Name : <?php echo e($book->writername); ?></div>
        <div class="book-category">Book Category : <?php echo e($book->catergoryname); ?></div>
        <div class="book-status">Status : <?php echo e($book->status); ?></div>
        <div class="book-type">Book Type : <?php echo e($book->booktype); ?></div>
        <div class="book-condition">Book Type : <?php echo e($book->bookcondition); ?></div>
        <div class="book-adtl-details">Details : <?php echo e($book->details); ?></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>


<style>

.menu-list1 a {
    color:#2e77d1 !important;
}
        
</style>
<?php echo $__env->make('lms.master.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>