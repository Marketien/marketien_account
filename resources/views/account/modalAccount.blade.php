<div class="modal fade" id="editModal{{$account->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Input</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/account-edit" method="POST">
            @csrf
            <div class="form-group  mb-3">
                {{-- <label for="cashOutDebit">Id</label> --}}
                <input type="text" class="formInput"  name="id"  placeholder="Enter amount" value="{{$account->id}}" hidden>
              </div>
            <div class="form-group  mb-3">
              <label for="cashOutDebit">CashOut Debit:</label>
              <input type="text" class="formInput"  name="cash_out"  value="{{$account->cash_out_debit}}" >
            </div>
            <div class="form-group  mb-3">
              <label for="cashInCredit">CashIn Credit:</label>
              <input type="text" class="formInput"  name="cash_in" value="{{$account->cash_in_credit}}">
            </div>
            <div class="form-group  mb-3">
              <label for="description">Description:</label>
              <input type="text" class="formInput" name="description" value="{{$account->description}}" />
            </div>
            <div class="d-flex justify-content-center">

                <button type="submit" class="btn tableButton">Save changes</button>
            </div>
          </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn tableButton" data-bs-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>
