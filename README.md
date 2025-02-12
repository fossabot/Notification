[![Test](https://github.com/BracketSpace/Notification/workflows/Test/badge.svg)](https://github.com/BracketSpace/Notification/actions?query=workflow%3ATest)
[![Develop](https://github.com/BracketSpace/Notification/workflows/Develop/badge.svg)](https://github.com/BracketSpace/Notification/actions?query=workflow%3ADevelop)
[![Stable](https://github.com/BracketSpace/Notification/workflows/Stable/badge.svg)](https://github.com/BracketSpace/Notification/actions?query=workflow%3AStable)

# Notification

![Notification banner](https://bracketspace.com/extras/notification/banner.png)
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fmbberry%2FNotification.svg?type=shield)](https://app.fossa.com/projects/git%2Bgithub.com%2Fmbberry%2FNotification?ref=badge_shield)

This is the public repository for Notification - the WordPress plugin.

This plugin allow you to send custom notifications about various events in WordPress. It also comes with simple yet powerful API by which you can add literally **any** trigger action.

By default it supports Email, Webhook and Webhook plain JSON notifications.

## Default Triggers

<details>
<summary>Comment, Pingback, Trackback and Custom Comment Type</summary>

This covers all the comment types. Use `comment`, `pingback`, `trackback`, `another_comment_type` instead of the `{comment_type_slug}`.

| Trigger name | Trigger slug |
| :--- | :--- |
| Comment added | `comment/{comment_type_slug}/added` |
| Comment approved | `comment/{comment_type_slug}/approved` |
| Comment replied | `comment/{comment_type_slug}/replied` |
| Comment spammed | `comment/{comment_type_slug}/spammed` |
| Comment trashed | `comment/{comment_type_slug}/trashed` |
| Comment unapproved | `comment/{comment_type_slug}/unapproved` |
| Comment published | `comment/{comment_type_slug}/published` |

</details>

<details>
<summary>Media</summary>

| Trigger name | Trigger slug |
| :--- | :--- |
| Media added | `media/added` |
| Media trashed | `media/trashed` |
| Media updated | `media/updated` |

</details>

<details>
<summary>Plugin</summary>

| Trigger name | Trigger slug |
| :--- | :--- |
| Plugin activated | `plugin/activated` |
| Plugin deactivated | `plugin/deactivated` |
| Plugin installed | `plugin/installed` |
| Plugin removed | `plugin/removed` |
| Plugin updated | `plugin/updated` |

</details>

<details>
<summary>Post, Page and Custom Post Type</summary>

This covers all the custom post types, as well. Use `post`, `page`, `product`, `another_post_type` instead of the `{post_type_slug}`.

| Trigger name | Trigger slug |
| :--- | :--- |
| Post added | `post/{post_type_slug}/added` |
| Post saved as a draft | `post/{post_type_slug}/drafted` |
| Post sent for review | `post/{post_type_slug}/pending` |
| Post approved | `post/{post_type_slug}/approved` |
| Post published | `post/{post_type_slug}/published` |
| Post trashed | `post/{post_type_slug}/trashed` |
| Post updated | `post/{post_type_slug}/updated` |
| Post scheduled | `post/{post_type_slug}/scheduled` |

</details>

<details>
<summary>Category, Tag and Custom Taxonomy</summary>

This covers all the taxonomies. Use `category`, `post_tag`, `another_taxonomy` instead of the `{taxonomy_slug}`.

| Trigger name | Trigger slug |
| :--- | :--- |
| Taxonomy term created | `taxonomny/{taxonomy_slug}/created` |
| Taxonomy term deleted | `taxonomny/{taxonomy_slug}/deleted` |
| Taxonomy term updated | `taxonomny/{taxonomy_slug}/updated` |

</details>

<details>
<summary>Theme</summary>

| Trigger name | Trigger slug |
| :--- | :--- |
| Theme installed | `theme/installed` |
| Theme switched | `theme/switched` |
| Theme updated | `theme/updated` |

</details>

<details>
<summary>User</summary>

| Trigger name | Trigger slug |
| :--- | :--- |
| User deleted | `user/deleted` |
| User login | `user/login` |
| User login failed | `user/login_failed` |
| User logout | `user/logout` |
| User password changed | `user/password_changed` |
| User password reset request | `user/password_reset_request` |
| User profile updated | `user/profile_updated` |
| User role changed | `user/role_changed` |

</details>

<details>
<summary>WordPress</summary>

| Trigger name | Trigger slug |
| :--- | :--- |
| Available updates | `wordpress/updates_available` |

</details>

<details>
<summary>Privacy</summary>

| Trigger name | Trigger slug |
| :--- | :--- |
| Personal Data erased | `privacy/data-erased` |
| Personal Data erase request | `privacy/data-erase-request` |
| Personal Data exported | `privacy/data-exported` |
| Personal Data export request | `privacy/data-export-request` |

</details>

## Extensibility

The Notification plugin have multiple APIs which gives you the ability to customize the plugin. The most important ones are:

  - [Trigger API](https://docs.bracketspace.com/notification/developer/triggers/custom-trigger) - you can wrap any WordPress' `do_action` into a Trigger.
  - [Carrier API](https://docs.bracketspace.com/notification/developer/carriers/custom-carrier) - you can register a custom Carrier, like a service connection. Carriers are independent from Triggers and works with   all default and custom Triggers out of the box. It's packed with configuration form builder.
  - [Recipient API](https://docs.bracketspace.com/notification/developer/recipients/custom-recipient) - you can register a custom Recipients for your Carriers. Like automatically pulled users from external database or simply custom user query with meta etc.
  - Resolver API - you can create another Merge Tag resolver, ie. `{customtag param1}` which is handled differently than a standard Merge Tag.
  - Settings API - for quick plugin Settings registration

### Bundling the plugin

You can ship this plugin as a part of your plugin or theme. Just copy the plugin directory into your folder and require `load.php` file. Read more about the [plugin bundling](https://docs.bracketspace.com/notification/developer/general/bundling) and [plugin loading stack](https://docs.bracketspace.com/notification/developer/general/plugin-loading-chain).

### White labeling

You can integrate this plugin with your system with a simple white labeling, it's a single `notification_whitelabel()` function to call. Read the [full white labeling documentation](https://docs.bracketspace.com/notification/developer/general/white-label-mode).

## Quick links

* [Documentation](https://docs.bracketspace.com/notification/)
* [WordPress readme](https://github.com/BracketSpace/Notification/blob/master/readme.txt)
* [WordPress.org repository](https://wordpress.org/plugins/notification/)

## Development version

You can download build development version from the [Development workflow](https://github.com/BracketSpace/Notification/actions?query=workflow%3ADevelop). Click the latest run and download generated artifact.


## License
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fmbberry%2FNotification.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2Fmbberry%2FNotification?ref=badge_large)