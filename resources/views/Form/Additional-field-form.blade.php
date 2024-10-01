@extends('index')
@section('content')
    <div class="container others_container">
        <div class="card-group">
            <div class="card">
                <div class="card-body">

                    {{-- Skills --}}
                    <strong>Skills</strong>
                    <div class="mb-3">
                        <select multiple class="form-select form-select-lg" name="skills[]" id="skills_select">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>

                    {{-- Language --}}
                    <strong>Languages</strong>
                    <div class="card mt-4 mb-4">
                        <div class="card-body lang_fetch mt-2 mb-2">
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Language</label>
                                    <input type="text" name="language[]" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                    @error('language')
                                        <small id="helpId" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Reading</label>
                                    <select class="form-select" name="lang_reading[]" id="">
                                        <option selected>Select one</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row p-2 mb-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Writing</label>
                                    <select class="form-select" name="lang_writing[]" id="">
                                        <option selected>Select one</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Speaking</label>
                                    <select class="form-select" name="lang_speaking[]" id="">
                                        <option selected>Select one</option>
                                        <option value="">New Delhi</option>
                                        <option value="">Istanbul</option>
                                        <option value="">Jakarta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <button type="button" id="addBtnLanguage" class="btn btn-outline-primary col-2">Add</button>
                        </div>
                    </div>

                    {{-- Training --}}
                    <strong>Training</strong>
                    <div class="card p-2 mb-4 mt-4">
                        <div class="card-body training_fetch">
                            <div class="training-section">
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="training_title[]" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Year</label>
                                        <select class="form-select" name="training_reading[]" id="">
                                            <option selected>Select one</option>
                                            <option value="">New Delhi</option>
                                            <option value="">Istanbul</option>
                                            <option value="">Jakarta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="" class="form-label">Institute</label>
                                    <input type="text" name="training_institute[]" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <button type="button" id="btnAddTraining" class="btn btn-outline-primary col-2">Add</button>
                        </div>
                    </div>

                    {{-- Award Certificate --}}
                    <strong>Awards/Certificate</strong>
                    <div class="card p-2 mb-4 mt-4">
                        <div class="card-body fetch_awards">
                            <div class="award-section">
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="award_title[]" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Associated/Institute</label>
                                        <input type="text" name="award_institution[]" id=""
                                            class="form-control" placeholder="" aria-describedby="helpId" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control award_description" name="award_description[]" id="description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <button type="button" id="btnAddAward" class="btn btn-outline-primary col-2">Add</button>
                        </div>
                    </div>

                    {{-- Social Links --}}
                    <strong>Social Network</strong>
                    <div class="card p-2 mt-4 mb-4">
                        <div class="card-body fetch_social">
                            <div class="social-section">
                                <div class="row p-2 ">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Social Media Name</label>
                                        <input type="text" name="social_name[]" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Profile URL</label>
                                        <input type="url" name="social_url[]" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <button type="button" id="btnAddSocialUrl"
                                class="btn btn-outline-primary col-2">Add</button>
                        </div>
                    </div>

                    {{-- References --}}

                    <strong>References</strong>
                    <div class="card p-2 mt-4 mb-4">
                        <div class="card-body fetch_reference">
                            <div class="reference-content">
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Reference Person</label>
                                        <input type="text" name="ref_name[]" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Position</label>
                                        <input type="url" name="ref_position[]" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Email</label>
                                        <input type="text" name="ref_email[]" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Company Name</label>
                                        <input type="url" name="company_name[]" id="" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <button type="button" id="btnAddReference"
                                class="btn btn-outline-primary col-2">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            // Initialize Select2
            $('#skills_select').select2();
            CKEDITOR.replace('description');

            // For Language Start
            $("#addBtnLanguage").on("click", function() {
                $(".lang_fetch").append(`
        <div class="language-section border border-primary mt-2 mb-2 rounded p-2">
               <div class="row p-2">
                    <div class="col-md-6">
                        <label for="" class="form-label">Language</label>
                        <input type="text" name="language" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" />
                        @error('language')
                            <small id="helpId" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Reading</label>
                        <select class="form-select" name="lang_reading" id="">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>
                </div>

                <div class="row p-2 mb-3">
                    <div class="col-md-6">
                        <label for="" class="form-label">Writing</label>
                        <select class="form-select" name="lang_writing" id="">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Speaking</label>
                        <select class="form-select" name="lang_speaking" id="">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                           <button type="button" class="btn btn-outline-danger col-2 btnRemoveLanguage">Remove</button>
                        </div>
                    </div>
                </div>
        `);
            });
            $(document).on("click", ".btnRemoveLanguage", function() {
                $(this).closest('.language-section').remove();
            });
            // For Language End

            // For Training Start
            $("#btnAddTraining").on("click", function() {
                $(".training_fetch").append(`
         <div class="training-section border border-primary mt-2 mb-2 rounded p-2">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="training_title[]" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Year</label>
                            <select class="form-select" name="training_reading[]" id="">
                                <option selected>Select one</option>
                                <option value="">New Delhi</option>
                                <option value="">Istanbul</option>
                                <option value="">Jakarta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="" class="form-label">Institute</label>
                        <input type="text" name="training_institute[]" id="" class="form-control"
                            placeholder="" aria-describedby="helpId" />
                    </div>
                     <div class="col-md-12 mt-3 mb-3">
                           <button type="button" class="btn btn-outline-danger col-2 btnRemoveTraining">Remove</button>
                        </div>
                </div>
        `);
            })

            $(document).on('click', '.btnRemoveTraining', function() {
                $(this).closest('.training-section').remove();
            })
            // For Training End

            // For Awards Start
            $("#btnAddAward").on("click", function() {
                $(".fetch_awards").append(`
         <div class="award-section border border-primary mt-2 mb-2 rounded p-2">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="award_title[]" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Associated/Institute</label>
                            <input type="text" name="award_institution[]" id=""
                                class="form-control" placeholder="" aria-describedby="helpId" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control award_description" name="award_description[]" id="description" rows="3"></textarea>
                    </div>
                     <div class="col-md-12 mt-3 mb-3">
                           <button type="button" class="btn btn-outline-danger col-2 btnRemoveAwards">Remove</button>
                        </div>
                </div>
        `);
            });

            $(document).on("click", ".btnRemoveAwards", function() {
                $(this).closest(".award-section").remove();
            })
            // For Awards End

            // Social Network Start
            $("#btnAddSocialUrl").on("click", function() {
                $(".fetch_social").append(`
         <div class="social-section border border-primary mt-2 mb-2 rounded p-2">
            <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Social Media Name</label>
                            <input type="text" name="social_name[]" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Profile URL</label>
                            <input type="url" name="social_url[]" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                        </div>
                         <div class="col-md-12 mt-3 mb-3">
                           <button type="button" class="btn btn-outline-danger col-2 btnRemoveSocial">Remove</button>
                        </div>
                        </div>
                    </div>
        `);
            })

            $(document).on("click", ".btnRemoveSocial", function() {
                $(this).closest('.social-section').remove();
            })
            // Social Network End


            // Reference Start
            $("#btnAddReference").on("click", function() {
                $(".fetch_reference").append(`
         <div class="reference-content mt-2 mb-2 rounded border border-primary">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label for="" class="form-label">Reference Person</label>
                            <input type="text" name="ref_name[]" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Position</label>
                            <input type="url" name="ref_position[]" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="ref_email[]" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Company Name</label>
                            <input type="url" name="company_name[]" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                        </div>
                    </div>
                      <div class="col-md-12 mt-3 mb-3">
                           <button type="button" class="btn btn-outline-danger col-2 btnRemoveReference">Remove</button>
                        </div>
                </div>
        `);
            })

            $(document).on("click", ".btnRemoveReference", function() {
                $(this).closest('.reference-content').remove();
            })
            // Reference End

        })
    </script>
@endsection
