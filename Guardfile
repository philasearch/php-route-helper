guard 'phpunit2', :cli => '--colors', tests_path: 'tests' do

  watch(%r{^.+Test\.php$})

  watch(%r{lib/Philasearch/IO/(.+)\.php}) { |m| "tests/Philasearch/IO/#{m[1]}Test.php" }
end
