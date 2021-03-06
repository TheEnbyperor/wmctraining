function update_publickey(e, t, n) {
    jQuery("#up_requestType").val(t);
    jQuery("#up_userEmail").val(n.userEmail);
    jQuery("#up_temToken").val(n.temToken);
    jQuery("#up_status").val(n.status);
    jQuery("#up_publicKey").val(n.publicKey);
    jQuery("#up_dropifi_login").submit();
    window.location.href=window.location.href;
}

jQuery(document).ready(function () {
        jQuery("#dropifi_create_new_account").click(function () {
                var e = jQuery("#requestUrl").val();
                var t = jQuery("#accessToken").val();
                var n = {};
                n.hostUrl = window.location.host;
                n.requestType = "SIGNUP";
                n.accessToken = t;
                n.requestUrl = e;
                n.displayName = jQuery("#displayName").val();
                n.user_email = jQuery("#user_email").val();
                n.user_re_password = jQuery("#user_re_password").val();
                n.user_password = jQuery("#user_password").val();
                n.user_domain = jQuery("#user_domain").val();
                n.site_url = jQuery("#site_url").val();
                jQuery("body").css("cursor", "wait");
                jQuery("#dropifi_create_new_account").css("cursor", "wait");
                jQuery.ajax({
                        type: "GET",
                        url: "https://www.dropifi.com/blog/wordpress/signup.json",
                        dataType: "jsonp",
                        jsonp: "s",
                        crossDomain: true,
                        data: {
                            displayName: n.displayName,
                            user_email: n.user_email,
                            user_password: n.user_password,
                            user_re_password: n.user_re_password,
                            user_domain: n.user_domain,
                            hostUrl: n.hostUrl,
                            requestUrl: n.requestUrl,
                            accessToken: n.accessToken,
                            site_url: n.site_url,
                            type: "json"
                        },
                        success: function (t) {
                            if (t.status == 200) {
                                update_publickey(e, n.requestType, t)
                            } else {
                                jQuery("#dropifi_s_message_status").html(t.msg);
                                jQuery("#dropifi_s_message_status").css({
                                        "background-color": "#de4343",
                                        "border-color": "#c43d3d"
                                    });
                                jQuery("body").css("cursor", "pointer");
                                jQuery("#dropifi_login_account").css("cursor", "pointer")
                            }
                        },
                        error: function (e) {
                            jQuery("#dropifi_s_message_status").html("An error occurred while submiting your details, try creating the account again");
                            jQuery("#dropifi_s_message_status").css({
                                    "background-color": "#de4343",
                                    "border-color": "#c43d3d"
                                });
                            jQuery("body").css("cursor", "pointer");
                            jQuery("#dropifi_create_new_account").css("cursor", "pointer")
                        }
                    })
            });
        jQuery("#dropifi_login_account").click(function () {
                var e = jQuery("#l_requestUrl").val();
                var t = {};
                t.requestType = "LOGIN";
                t.login_email = jQuery("#login_email").val();
                t.accessKey = jQuery("#accessKey").val();
                t.accessToken = jQuery("#l_accessToken").val();
                t.requestUrl = e;
                t.site_url = jQuery("#l_site_url").val();
                jQuery("body").css("cursor", "wait");
                jQuery("#dropifi_login_account").css("cursor", "wait");
                jQuery.ajax({
                        type: "GET",
                        url: "https://www.dropifi.com/blog/wordpress/loginToken.json",
                        dataType: "jsonp",
                        data: {
                            login_email: t.login_email,
                            accessKey: t.accessKey,
                            requestUrl: t.requestUrl,
                            accessToken: t.accessToken,
                            site_url: t.site_url,
                            type: "json"
                        },
                        jsonp: "s",
                        crossDomain: true,
                        success: function (n) {
                            if (n.status == 200) {
                                update_publickey(e, t.requestType, n)
                            } else {
                                jQuery("#dropifi_l_message_status").html(n.msg);
                                jQuery("#dropifi_l_message_status").css({
                                        "background-color": "#de4343",
                                        "border-color": "#c43d3d"
                                    });
                                jQuery("body").css("cursor", "pointer");
                                jQuery("#dropifi_login_account").css("cursor", "pointer")
                            }
                        },
                        error: function (e) {
                            jQuery("body").css("cursor", "pointer");
                            jQuery("#dropifi_login_account").css("cursor", "pointer");
                            jQuery("#dropifi_l_message_status").html("An error occurred while submiting your details, try logging into your account again");
                            jQuery("#dropifi_l_message_status").css({
                                    "background-color": "#de4343",
                                    "border-color": "#c43d3d"
                                })
                        }
                    })
            });
        jQuery("#reset_dropifi_account").click(function () {
                var e = jQuery("#r_requestUrl").val();
                var t = {};
                t.requestType = "RESET_DROPIFI_ACCOUNT";
                t.requestUrl = e;
                jQuery.ajax({
                        type: "GET",
                        url: e,
                        dataType: "json",
                        data: {
                            userdata: t
                        },
                        success: function (e) {
                            window.location.href=window.location.href;
                        },
                        error: function (e) {
                        	window.location.href=window.location.href;
                        }
                    })
            });
        jQuery(".dropifi_l_msg_error").click(function () {
                jQuery("#dropifi_l_message_status").html("Once you submit your login details below, the Dropifi contact widget will be installed on your site. Login to your dropifi account to customize the look and feel of your widget.");
                jQuery("#dropifi_l_message_status").css({
                        "background-color": "#4ea5cd",
                        "border-color": "#3b8eb5"
                    })
            });
        jQuery(".dropifi_s_msg_error").click(function () {
                jQuery("#dropifi_s_message_status").html("Once you submit the details below, the Dropifi contact widget will be installed on your site. Login to your dropifi account to customize the look and feel of your widget.");
                jQuery("#dropifi_s_message_status").css({
                        "background-color": "#4ea5cd",
                        "border-color": "#3b8eb5"
                    })
            })
    })