<div class="modal fade" id="staticBackdrop{{$account->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title-1 fs-5" id="staticBackdropLabel ">Do You Agree to Delete?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <a href="/account-delete/{{$account->id}}" class="btn tableButton">Yes</a>
          <button type="button" class="btn tableButton" data-bs-dismiss="modal" aria-label="Close">No</button>
        </div>
      </div>
    </div>
  </div>
