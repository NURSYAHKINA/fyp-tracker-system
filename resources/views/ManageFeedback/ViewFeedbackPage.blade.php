@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-md-right">
                <a href="{{route('ListFeedback')}}"><button class="btn btn-primary float-md-right"><i class="fas fa-chevron-left"></i></button></a>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--begin::Tab-->
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <!--begin::Row-->
                        <div class="card-header">
                            <h1 class="card-title"><i class="fas fa-user">&nbsp;&nbsp;&nbsp;</i>Feedback Information</h1>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form method="POST" class="form form-horizontal" action="">
                                    <div class="form-body">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Full Name</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" class="form-control border-primary" placeholder="names" id="names" name="names" value="{{ old('names', $FeedbackRecord->names) }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Rating</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input class="form-control border-primary" type="rating" placeholder="rating" name="rating" id="rating" value="{{ old('rating', $FeedbackRecord->rating) }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Comment</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input class="form-control border-primary" type="comment" placeholder="comment" name="comment" id="comment" value="{{ old('comment', $FeedbackRecord->comment) }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Date</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input class="form-control border-primary" placeholder="date" name="date" id="date" value="{{ old('date', $FeedbackRecord->date) }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div>
@endsection
