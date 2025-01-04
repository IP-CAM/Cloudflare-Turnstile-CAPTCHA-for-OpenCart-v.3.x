# Cloudflare Turnstile CAPTCHA Extension for OpenCart

This extension provides Cloudflare Turnstile CAPTCHA integration for your OpenCart store. Cloudflare Turnstile is a user-friendly and secure CAPTCHA solution.

## Features

- Easy installation and configuration
- Manageable settings from admin panel
- Cloudflare Turnstile integration
- CAPTCHA validation for form protection
- Responsive design support

## Requirements

- OpenCart 3.x
- PHP 7.0 or higher
- Active Cloudflare account
- Cloudflare Turnstile site and secret keys

## Installation

1. Upload all files to your OpenCart root directory
2. Go to Extensions > Installer in admin panel
3. Upload the install.xml file
4. Select Captcha type from Extensions > Extensions
5. Install and enable Cloudflare Turnstile

## Configuration

1. Go to Turnstile section in your Cloudflare account
2. Generate new site key and secret key
3. Navigate to Extensions > Extensions > Captcha in admin panel
4. Edit Cloudflare Turnstile
5. Enter site key and secret key
6. Set status to "Enabled" and save

## File Structure
```
upload/
├── admin/
│ ├── controller/extension/captcha/cloudflare.php
│ ├── language/en-gb/extension/captcha/cloudflare.php
│ └── view/template/extension/captcha/cloudflare.twig
├── catalog/
│ ├── controller/extension/captcha/cloudflare.php
│ └── view/theme/default/template/extension/captcha/cloudflare.twig
└── install.xml
```

## Security

- Store your site and secret keys securely
- Regularly check CAPTCHA statistics from Cloudflare panel
- Review your Cloudflare settings in case of suspicious activity

## Troubleshooting

1. If CAPTCHA is not visible:
   - Check for JavaScript console errors
   - Verify site key is entered correctly
   - Confirm your Cloudflare account is active

2. If CAPTCHA validation fails:
   - Ensure secret key is entered correctly
   - Check if PHP cURL is enabled
   - Verify your server IP is whitelisted in Cloudflare

## Support

For issues:
- Open an issue on GitHub
- Visit Cloudflare support pages
- Ask for help on OpenCart forums

## License

This extension is released under the GNU General Public License v3.0


## Developer

MorphyKutay
- Website: https://www.kutaysec.online/
- GitHub: https://github.com/MorphyKutay

## Changelog

### v1.0.0
- Initial release
- Basic CAPTCHA functionality
- Admin panel integration

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Acknowledgments

- Thanks to Cloudflare for providing the Turnstile service
- OpenCart community for support and feedback