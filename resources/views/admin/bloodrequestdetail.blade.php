@extends('admin.template')
@section('content') 
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                {{ __('Blood Request') }} 
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-primary" role="alert">
                                        {{ session('message') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Request By</h5> 
                                Full Name : {{$user->name}} {{$user->lname}} <br />
                                Mobile Number : {{$user->email}} <br />
                                Address: {{$user->city}}

                            </div>
                            <div class="col-md-6">
                                <h5>Patient Information</h5>
                                Full Name : {{$requested->pname}}, {{$requested->page}} age, {{$requested->pgender}} <br />
                                Address : {{$requested->pprovince}}, {{$requested->pdistrict}}, {{$requested->pminicipality}}-{{$requested->pwordno}} <br />
                                {{$requested->pcity}}, {{$requested->ptole}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                Requested Blood Group : {{$requested->requestedblood}} {{$requested->requestedbloodunit}} unit(s) <br />
                                Hopital Name : {{$requested->hospitalname}} <br />
                                Hospital Address : {{$requested->hospitaladdress}} <br />
                                Blood Request Date : {{$requested->requesteddatetime}} <br />
                                Hospital Ref. No. : {{$requested->refno}}
                            </div>
                            <div class="col-md-6">
                                <form action="{{route('admin.postResponse', $requested->id)}}" method="POST">
                                    @csrf()
                                    Response <br />
                                    <select name="response11" id="" required>
                                        <option value="">Choose response</option>
                                        <option value="Yes" <?php if($requested->accepted == 'Yes'){ echo 'selected'; } ?>>Available</option>
                                        <option value="No" <?php if($requested->accepted == 'No'){ echo 'selected'; } ?>>Not Available</option>
                                    </select> <br />
                                    Message <br />
                                    <textarea name="message1" id="">{{$requested->bloodbankmessage}}</textarea> <br />
                                    <input type="checkbox" name="sendsms"> Notify by SMS? <br />

                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Donor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.postNewDonor')}}" method="POST">
            @csrf()
        <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>First name </label>   
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="fName" name="name" placeholder="">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lName" name="lname" placeholder=" ">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                    <label> Gender * </label><br />
                        <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Male">
                        <span class="form-check-label"> Male </span>
                        </label>
                        <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Female">
                        <span class="form-check-label"> Female</span>
                        </label>
                        <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Other">
                        <span class="form-check-label"> Other</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Province *</label> 
                        <select id="provinceSel" name="province" class="form-control" size="1" required>
                        <option selected=""> Choose Province</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>District *</label> 
                        <select id="destrictsSel" name="district" class="form-control" size="1" required>
                        <option selected=""> Choose District</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Municipality *</label> 
                        <select id="municipalitySel" name="minicipality" class="form-control" size="1" required>
                        <option selected=""> Choose Municipality</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                          <label>Word No *</label> 
                          <select id="wordno" name="word_no" class="form-control" size="1" required>
                            <option selected=""> Choose word</option>
                            <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                          <option value="11">11</option>
                                          <option value="12">12</option>
                                          <option value="13">13</option>
                                          <option value="14">14</option>
                                          <option value="15">15</option>
                                          <option value="16">16</option>
                                          <option value="17">17</option>
                                          <option value="18">18</option>
                                          <option value="19">19</option>
                                          <option value="20">20</option>
                                          <option value="21">21</option>
                                          <option value="22">22</option>
                                          <option value="23">23</option>
                                          <option value="24">24</option>
                                          <option value="25">25</option>
                                          <option value="26">26</option>
                                          <option value="27">27</option>
                                          <option value="28">28</option>
                                          <option value="29">29</option>
                                          <option value="30">30</option>
                                          <option value="31">31</option>
                                          <option value="32">32</option>
                                          <option value="33">33</option>
                                          <option value="34">34</option>
                          </select>
                      </div>
                    <div class="form-group col-md-4">
                      <label>City *</label>
                      <input type="text" id="city" name="city" class="form-control" required>
                    </div> 
                    <div class="form-group col-md-4">
                      <label>Tole *</label>
                      <input type="text" id="tole" name="tole" class="form-control" required>
                    </div>
                </div>
                  
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Mobile Number *</label>
                      <input type="number" id="email" name="email" class="form-control" required>
                      <small><input type="checkbox" name="makeaccount"> make donor login account?</small>
                       
                    </div>
                    <div class="form-group col-md-4">
                        <label>Blood Group *</label>
                        <select id="blood_group" class="form-control" name="bloodgroup"  required>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Date of Birth *</label>
                        <input type="date" id="dob" name="dob" class="form-control" required>
                      </div>
                </div>
                    
                   
                   
                  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@stop
@section('js')

@stop