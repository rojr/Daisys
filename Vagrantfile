# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.box = "centos_php70.box"
  config.ssh.password = "vagrant"
  config.vm.box_url = "http://files.gcdtech.com/vagrant/centos_php70.box"
  config.vm.provision "shell", :path => "vagrant/provision.sh"

  config.vm.network "forwarded_port", guest: 80, host: 8080, auto_correct: true
  config.vm.network "forwarded_port", guest: 3306, host: 3307, auto_correct: true
  config.vm.synced_folder "./", "/vagrant/",
      mount_options: ["dmode=777,fmode=777"]

end
