<div class="team" id="team">
        <div class="container">
            <div class="w3-heading-all">
                    <h3>Our Team</h3>
                </div>
            <div class="teamgrids">
                @foreach ($team as $teamMember)
                <div class="col-md-3 teamgrid1">
                        <img src="{{asset('uploads/profile/'.$teamMember->cover_img)}}" alt="" />
                        <div class="teaminfo">
                            <h3>{{$teamMember->name}}</h3>
                            <div class="team-social">
                                <a href="{{$teamMember->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{$teamMember->twitter}}"><i class="fa fa-twitter"></i></a>
                                <a href="{{$teamMember->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                <a href="{{$teamMember->instagram}}"><i class="fa fa-instagram"></i></a>
                            </div>
                            <p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{$teamMember->position}}</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> {{$teamMember->phoneNumber}}</p>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:{{$teamMember->email}}" style="font-size:12px"> {{$teamMember->email}}</a>
                            </p>
                        </div>
                    </div>
                @endforeach
              
              
                <div class="clearfix"></div>
            </div>
        </div>
    </div>