@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-header">Create new client</div>
                    <div class="form-group">
                        @include('components.alerts')
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('save-client') }}" enctype="multipart/form-data" id="clientForm">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fname">First Name</label><br>
                                        <input type="text" class="form-control" id="fname" name="fname"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label><br>
                                        <input type="text" class="form-control" id="lname" name="lname"
                                            value="" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="contact">Contact</label><br>
                                        <input type="text" class="form-control" id="contact" name="contact"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email Address</label><br>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gender">Gender</label><br>
                                        <select class="form-control" id="gender" name="gender" required>

                                            <option value="1">Male</option>
                                            <option value="2">Female</option>

                                          </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="dateField1">Date of birthday</label><br>
                                        <input id="dateField1" type="date" name="date_of_birth" required>
                                        {{-- <div class="dateDropdown"> --}}
                                            <!-- Hidden input fields to store date, month, and year -->
                                            {{-- <input type="hidden" class="hidden-day" name="hidden_day" id="hidden_day">
                                            <input type="hidden" class="hidden-month" name="hidden_month" id="hidden_month">
                                            <input type="hidden" class="hidden-year" name="hidden_year" id="hidden_year"> --}}

                                            <!-- Date selector elements -->
                                            {{-- <select class="day" name="day" ></select>
                                            <select class="month" name="month" ></select>
                                            <select class="year" name="year" ></select> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="street_no">Street No</label><br>
                                        <input type="text" class="form-control" id="street_no" name="street_no"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="street_address">Street Address</label><br>
                                        <input type="street_address" class="form-control" id="street_address" name="street_address"
                                            value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="city">City</label><br>
                                        <input type="text" class="form-control" id="city" name="city"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">

                                        <label for="status">Active/Inactive</label><br>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Save</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
 $(document).ready(function () {

    var s,
      DateWidget = {
        settings: {
          months: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'],
          day: new Date().getUTCDate(),
          currMonth: new Date().getUTCMonth(),
          currYear: new Date().getUTCFullYear(),
          yearOffset: 21,
          containers: $(".dateDropdown")
        },

        init: function() {
          s = this.settings;
          DW = this;
          s.containers.each(function(){
            DW.removeFallback(this);
            DW.createSelects(this);
            DW.populateSelects(this);
            DW.initializeSelects(this);
            DW.bindUIActions();
          })
        },

        getDaysInMonth: function(month, year) {
           return new Date(year, month, 0).getDate();
        },

        addDays: function(daySelect, numDays){
          $(daySelect).empty();

          for(var i = 0; i < numDays; i++){
            $("<option />")
              .text(i + 1)
              .val(i + 1)
              .appendTo(daySelect);
          }
        },

        addMonths: function(monthSelect){
          for(var i = 0; i < 12; i++){
            $("<option />")
              .text(s.months[i])
              .val(s.months[i])
              .appendTo(monthSelect);
          }
        },

        addYears: function(yearSelect){
          for(var i = 0; i < s.yearOffset; i++){
            $("<option />")
              .text(i + s.currYear)
              .val(i + s.currYear)
              .appendTo(yearSelect);
          }
        },

        removeFallback: function(container) {
          $(container).empty();
        },

        createSelects: function(container) {
          $("<select class='day'>").appendTo(container);
          $("<select class='month'>").appendTo(container);
          $("<select class='year'>").appendTo(container);
        },

        populateSelects: function(container) {
          DW.addDays($(container).find('.day'), DW.getDaysInMonth(s.currMonth, s.currYear));
          DW.addMonths($(container).find('.month'));
          DW.addYears($(container).find('.year'));
        },

        initializeSelects: function(container) {
          $(container).find('.day').val(s.day);
          $(container).find('.currMonth').val(s.month);
          $(container).find('.currYear').val(s.year);
        },

        bindUIActions: function() {
          $(".month").on("change", function(){
            var daySelect = $(this).prev(),
                yearSelect = $(this).next(),
                month = s.months.indexOf($(this).val()) + 1,
                days = DW.getDaysInMonth(month, yearSelect.val());
            DW.addDays(daySelect, days);
          });

          $(".year").on("change", function(){
            var daySelect = $(this).prev().prev(),
                monthSelect = $(this).prev(),
                month = s.months.indexOf(monthSelect.val()) + 1,
                days = DW.getDaysInMonth(month, $(this).val());
            DW.addDays(daySelect, days);
          });
        }
      };

      DateWidget.init();
        // Update hidden input fields with selected values when the form is submitted
        $('#clientForm').submit(function () {
            var day = $('.day').val();
            var month = $('.month').val();
            var year = $('.year').val();

            // Debugging: Log the values before submitting the form
            console.log("Day: " + day);
            console.log("Month: " + month);
            console.log("Year: " + year);

            // Update hidden input fields
            $('#hidden_day').val(day);
            $('#hidden_month').val(month);
            $('#hidden_year').val(year);
        });
    });

    </script>
@endsection
