<a href="{{ route('admin.plans.show', $plan->id) }}" class="btn btn-primary btn-sm">View</a>

<a data-toggle="modal" data-target="#plan{{ $plan->id }}"  class="btn btn-primary btn-sm">Edit</a>

<!-- Modal -->
<div class="modal fade" id="plan{{ $plan->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.plans.update', $plan->id) }}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Name:</label>
                              <input type="text" name="name" value="{{ $plan->name }}" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">Description:</label>
                              <textarea class="form-control" name="desc" id="message-text">{{ $plan->description }}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="col-9">
                                    <div class="form-group">
                                      <label for="">Interval Type</label>
                                      <input type="text" name="interval_type" value="{{ $plan->interval }}" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                      <label for="">Count</label>
                                      <input type="text" name="count" value="{{ $plan->interval_count }}" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="">Delivery Fee</label>
                              <input type="text" name="delivery_fee" value="{{ $plan->delivery_fee }}" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" name="slug" value="{{ $plan->slug }}" class="form-control" placeholder="" aria-describedby="helpId">
                              </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
            </div>

        </div>
    </div>
</div>
