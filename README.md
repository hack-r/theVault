# 🏰 theVault

Welcome to **theVault**! This is a prototype darknet vendor store inspired by:

1. Goldhat Free Market
2. The epic 2024 'medical thriller' ["Baby X" by Kira Peikoff](https://www.barnesandnoble.com/w/baby-x-kira-peikoff/1143604735), which explores a near-future darknet vendor store for selling DNA in wake of advances in fertilization technologies.

Goldhat was a legal darknet market-like store comprising a major PHP upgrade (from v7 to v8, with many ripple effects) as well as a security enhancement fork of Eckmar's Marketplace v2.0 with significant hardening of Nginx. Goldhat also restricted user-to-user communications and implemented other safeguards to prevent abuse during its public beta. Thanks to Eckmar, who can be contacted on XMPP: eckmar@creep.im or eckmar@xmpp.zone. 

Happy Valentine's Day to KP. <3

## 🚀 Project Overview

**theVault** is a transformation of previous projects into a fully functional vendor store. It builds upon the foundations laid by Eckmar's Market and Goldhat Free Market, updating the codebase to utilize **Laravel 11** and **PHP 8.3.x**.

This project has been tested on Debian and Fedora. Fedora is recommended on the basis that Debian is cruddy and basic. It probably runs fine on almost any linux but you'll need to update the installer commands (change dnf or apt to whatever you're using and map the package names to those for your distro).

### ⚙️ Features

- **Modern Framework**: Built on Laravel 11 and PHP 8.3.16 for enhanced performance and maintainability.
- **Elasticsearch Vectorstore**: Fast searching with the newest elasticsearch (currently 8.17).
- **OpenJDK**
- **Redis** 

## 📦 Installation

To get started with **theVault**, follow these steps:

1. Run the initial configuration script:
   `./fedora_installer_part1.sh`

2. Follow the instructions in `the_manual_mariadb_step.txt` to set up your MariaDB database.

3. Complete the installation by running:
   `./fedora_installer_part2.sh`

The process is identical for Debian, but uses apt and package names end with -dev in Debian where they are -devel for Fedora. The installer will attempt to directly install elasticsearch for you, but I recommend to comment that out and use either the provided repo file for a dnf/yum-based installation or use the Docker container from https://elastic.co. Other installation strategies are also available on their website.

	sudo dnf install --enablerepo=elasticsearch elasticsearch

## ⚠️ Status and Important Notes (MUST READ)

- As of mid-February 2025, **advanced security features** and pentest audits have **NOT** yet been added to the project. 
- Extra Nginx hardening is also pending. If you plan to put a clone or fork online, please ensure you handle these components yourself or consider hiring me for assistance.

## 💼 Freelance Support

I offer freelance support as a maintainer or developer for **theVault**. Please note that any work I undertake must be legally compliant. If you require assistance with development, maintenance, or security enhancements, feel free to reach out!

## 📅 Future Updates

- **Laravel 12** is set to launch in less than two weeks. It is recommended to upgrade the project or any forks to stay current with the latest features and improvements.

## 🤝 Contributing

Contributions are welcome! If you have suggestions or improvements, feel free to open an issue or submit a pull request.

## 📜 License

This project is licensed under a custom, MIT-like license. See the [LICENSE](https://github.com/hack-r/theVault/blob/main/LICENSE) file for more details.

## 📞 Contact

For inquiries or support, please reach out to me directly. I can be reached by GitHub and LinkedIn.

---

## ⚖️ Legal Disclaimers

1. **No Illegal Activities**: This project is intended for educational and research purposes only. Any use of this software for illegal activities is strictly prohibited.

2. **Compliance**: Users are responsible for ensuring that their use of this software complies with all applicable laws and regulations in their jurisdiction.

3. **No Warranty**: This software is provided "as is," without warranty of any kind, express or implied, including but not limited to the warranties of merchantability, fitness for a particular purpose, and non-infringement.

4. **Liability**: In no event shall the author or contributors be liable for any damages arising from the use of this software, including but not limited to direct, indirect, incidental, punitive, and consequential damages.

5. **User Responsibility**: Users are solely responsible for any consequences arising from their use of this software, including any legal repercussions.

## 🎩 Friendly Advice

Big Brother leverages the Eye of Sauron and has many dungeons. The darknet is filled with hackers and LEAs. If you're thinking of using this code to run a drug market/store or other illegal activities, please rethink it. You'll get yourself into trouble. Use this to learn or to give the so-called 'dark net' some much needed original, non-illegal functionality. If you have money to invest and want a few ideas as well as a business partner, drop me a line.

---

Thank you for checking out **theVault**! Have fun and be good. 🚀
