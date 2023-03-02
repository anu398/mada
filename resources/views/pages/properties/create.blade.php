@extends('pages.layouts.app')

@section('title', 'Tests')

@section('header')
    <div class="container">
        <h1 class="page-title mt-3">Properties Rent Commission Details</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="panel">
            <form id="form-create" method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="panel-body pt-40 pb-5">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Name<span class="required">*</span> </label>
                                <div class="col-md-9">
                                    <input id="name" name="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Test Name" value="{{ old('name') }}"
                                           autocomplete="off">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Project Name<span class="required">*</span> </label>
                                <div class="col-md-9">
                                    <input id="project_name" name="project_name" type="text"
                                           class="form-control @error('project_name') is-invalid @enderror"
                                           placeholder="Project Name" value="{{ old('project_name') }}"
                                           autocomplete="off">

                                    @error('project_name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Price<span class="required">*</span> </label>
                                <div class="col-md-9">
                                    <input id="price" name="price" type="number" min="0" step="any"
                                           class="form-control @error('price') is-invalid @enderror"
                                           placeholder="Price" value="{{ old('price') }}"
                                           autocomplete="off">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Commission Percentage<span class="required">*</span> </label>
                                <div class="col-md-9">
                                    <input id="commission_percentage" name="commission_percentage" type="number" min="0" max="100"
                                           class="form-control @error('commission_percentage') is-invalid @enderror"
                                           placeholder="Commission Percentage" value="{{ old('commission_percentage') }}"
                                           autocomplete="off">

                                    @error('commission_percentage')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Commission Amount</label>
                                <div class="col-md-9">
                                    <input id="commission_amount" readonly name="commission_amount" type="number" min="0"
                                           class="form-control @error('commission_amount') is-invalid @enderror"
                                           placeholder="Commission Amount" value="{{ old('commission_amount') }}"
                                           autocomplete="off">

                                    @error('commission_amount')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Agent Commission Percentage </label>
                                <div class="col-md-9">
                                    <input id="agent_commission_percentage" name="agent_commission_percentage" type="number" min="0" max="100"
                                           class="form-control @error('agent_commission_percentage') is-invalid @enderror"
                                           placeholder="Agent Commission Percentage" value="{{ old('agent_commission_percentage') }}"
                                           autocomplete="off">

                                    @error('agent_commission_percentage')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Agent Commission Amount </label>
                                <div class="col-md-9">
                                    <input id="agent_commission_amount"  min="0" step="any" name="agent_commission_amount" type="number"
                                           class="form-control @error('agent_commission_amount') is-invalid @enderror"
                                           placeholder="Agent Commission Amount" value="{{ old('agent_commission_amount') }}"
                                           autocomplete="off">
                                    @error('agent_commission_amount')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Leader Commission Percentage </label>
                                <div class="col-md-9">
                                    <input id="leader_commission_percentage" name="leader_commission_percentage" type="number" min="0" max="100"
                                           class="form-control @error('leader_commission_percentage') is-invalid @enderror"
                                           placeholder="Leader Commission Percentage" value="{{ old('leader_commission_percentage') }}"
                                           autocomplete="off">

                                    @error('leader_commission_percentage')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Leader Commission Amount</label>
                                <div class="col-md-9">
                                    <input id="leader_commission_amount"  min="0" step="any" name="leader_commission_amount" type="number"
                                           class="form-control @error('leader_commission_amount') is-invalid @enderror"
                                           placeholder="Leader Commission Amount" value="{{ old('leader_commission_amount') }}"
                                           autocomplete="off">
                                    @error('leader_commission_amount')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary float-left" type="submit">CREATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{url('properties/excel/download')}}" method="post">
                @csrf
                <div class="panel-body pt-40 pb-5">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label">Select Fields</label>
                                <div class="col-md-7">
                                    <select class="form-select" multiple id="fields" name="fields[]">
                                        <option value="price">Price</option>
                                        <option value="commission_percentage">Commission Percentage</option>
                                        <option value="commission_amount">Commission Amount</option>
                                        <option value="agent_commission_percentage">Agent Commission Percentage</option>
                                        <option value="agent_commission_amount">Agent Commission Amount</option>
                                        <option value="leader_commission_percentage">Leader Commission Percentage</option>
                                        <option value="leader_commission_amount">Leader Commission Amount</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-secondary float-left" type="submit">Export</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('scripts')

    <script>
        $(function() {

            $("#fields").select2({
                placeholder: 'Select Feilds'
            });
            $("#commission_percentage").on('keyup',function(){
                    CalculateCommissionAmount();
                    CalculateAgentCommissionAmount();
                    CalculateLeaderCommissionAmount();
            });

            $("#price").on('keyup',function(){
                CalculateCommissionAmount();
                CalculateAgentCommissionAmount();
                CalculateLeaderCommissionAmount();
            });

            function CalculateCommissionAmount() {
                let commissionPercentage = $('#commission_percentage').val();
                let price = $('#price').val();
                let commissionAmount = (price/100)*commissionPercentage;
                $('#commission_amount').val(commissionAmount);
            }

            $("#agent_commission_percentage").on('keyup',function(){
                CalculateCommissionAmount();
                CalculateAgentCommissionAmount();
            });

            function CalculateAgentCommissionAmount() {
                let agentCommissionPercentage = $('#agent_commission_percentage').val();
                let commissionAmount = $('#commission_amount').val();
                let agentCommissionAmount = (commissionAmount/100)*agentCommissionPercentage;
                $('#agent_commission_amount').val(agentCommissionAmount);
                NewCommissionAmount = commissionAmount - agentCommissionAmount;
                $('#commission_amount').val(NewCommissionAmount);
            }

            $("#leader_commission_percentage").on('keyup',function(){
                CalculateLeaderCommissionAmount();
            });

            function CalculateLeaderCommissionAmount() {
                let leaderCommissionPercentage = $('#leader_commission_percentage').val();
                console.log(leaderCommissionPercentage);
                let commissionAmount = $('#commission_amount').val();
                console.log(commissionAmount);
                let leaderCommissionAmount = (commissionAmount/100)*leaderCommissionPercentage;
                $('#leader_commission_amount').val(leaderCommissionAmount);
                NewCommissionAmount = commissionAmount - leaderCommissionAmount;
                $('#commission_amount').val(NewCommissionAmount);
            }

        });
    </script>
@endpush

