<div>
    <div class="container" style="padding: 30px 0;">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                  All Banners1

                </div>
                <div class="col-md-6">
                  <a href="{{route('admin.addhomebanner1')}}" class="btn btn-success pull-right">Add New Banner1</a>

                </div>

              </div>

            </div>
            <div class="panel-body">
              @if(Session::has('message'))
              <div class="alert alert-success" role="alert">
                {{Session::get('message')}}

              </div>
              @endif
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($homebanners1 as $homebanner1)
                   <tr>
                     <td>{{$homebanner1->id}}</td>
                     <td><img src="{{asset('assets/images/homebanners')}}/{{$homebanner1->image}}" width="120" /></td>

                     <td>{{$homebanner1->link}}</td>
                     <td>{{$homebanner1->status ==1 ? 'Active':'Inactive'}}</td>
                     <td>{{$homebanner1->created_at}}</td>
                     <td>
                    <a href="{{route('admin.edithomebanner1',['homebanner1_id'=>$homebanner1->id])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                    <a href="#" wire:click.prevent="deleteHomeBanner1({{$homebanner1->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                     </td>
                   </tr>

                   @endforeach
                </tbody>

              </table>

            </div>

          </div>

        </div>

      </div>


    </div>
</div>
